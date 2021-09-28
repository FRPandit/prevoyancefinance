<?php

namespace App\Security;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;
////
    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private EntityManagerInterface $em;
    private CsrfTokenManagerInterface $csrfTokenManager;
    private UserPasswordHasherInterface $passwordHasher;
    private RequestStack $requestStack;
    private UserRepository $userRepository;

//***********************************************
//    public function __construct(UrlGeneratorInterface $urlGenerator)
//    {
//        $this->urlGenerator = $urlGenerator;
//    }
    public function __construct(UrlGeneratorInterface $urlGenerator, CsrfTokenManagerInterface $csrfTokenManager, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher,  RequestStack $requestStack, UserRepository $userRepository)
    {
        $this->urlGenerator = $urlGenerator;
        $this->em = $em;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordHasher = $passwordHasher;
        $this->requestStack = $requestStack;
        $this->userRepository = $userRepository;
    }

    public function supports(Request $request): bool
    {
        return self::LOGIN_ROUTE === $request->attributes->get('_route')
            && $request->isMethod('POST');
    }
//************************************************


//*******************************
//    public function authenticate(Request $request): PassportInterface
//    {
//        $mail = $request->request->get('mail', '');
//
//        $request->getSession()->set(Security::LAST_USERNAME, $mail);
//
//        return new Passport(
//            new UserBadge($mail),
//            new PasswordCredentials($request->request->get('password', '')),
//            [
//                new CsrfTokenBadge('authenticate', $request->get('_csrf_token')),
//            ]
//        );
//    }
    public function authenticate(Request $request): PassportInterface
    {

        $email = $request->request->get('email', ['email']);

        $request->getSession()->set(Security::LAST_USERNAME, $email);
//var_dump($request);
        return new Passport(
            new UserBadge($email, function ($identifier) {
                return $this->userRepository->findByPseudoOrMail($identifier);
            }),
            new PasswordCredentials($request->request->get('password',['pwd'])),
            [
                new CsrfTokenBadge('_token', $request->request->get('_token')),
            ]
        );

    }
//************************************


    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
        //return new RedirectResponse($this->urlGenerator->generate('some_route'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
        return new RedirectResponse($this->urlGenerator->generate('general'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
