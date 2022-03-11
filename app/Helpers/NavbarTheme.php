<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class NavbarTheme
{
    public static function getNavbarTheme()
    {
        if (Auth::check()) {
            if (Auth::user()->isUser()) {
                return 'navbar-dark bg-success';
            }

            if (Auth::user()->isStudent()) {
                return 'navbar-dark bg-primary';
            }

            if (Auth::user()->isAdmin()) {
                return 'navbar-light bg-light';
            }
        }
        else {
            return 'navbar-light bg-light';
        }
    }

    public static function getActiveNavbar()
    {

            if (request()->routeIs('dashboard') || request()->routeIs('dashboard.admin') || request()->routeIs('dashboard.student')) {
                return 'active';
            }
    }
}