<?php

namespace App\Security;

use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    public function handle(Request $request, AccessDeniedException $accessDeniedException): RedirectResponse
    {
        $request->getSession()->getFlashBag()->add('note', 'You have not the necessary privilege to do this operation!');
        return new RedirectResponse('/'); // @TODO: use abstract path name (home)
    }
}
