<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response
    {
        $nonce = base64_encode(random_bytes(16));

        // Make it available globally
        app()->instance('cspNonce', $nonce);
        view()->share('cspNonce', $nonce);
        $request->attributes->set('csp_nonce', $nonce);
        $response = $next($request);

        // $csp = "default-src 'self'; img-src 'self' data: https://cdn.example.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com data:; script-src 'self' 'unsafe-eval' 'nonce-$nonce' https://js.stripe.com; frame-src https://js.stripe.com; object-src 'none'; frame-ancestors 'none'; base-uri 'self'; connect-src 'self' https://api.stripe.com; media-src 'self';";
        $csp = "default-src 'self'; img-src 'self' data: https://cdn.example.com https://aiservice.yaraamanager.com https://niftyhms.com https://sandbox.web.squarecdn.com https://web.squarecdn.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://www.gstatic.com https://aiservice.yaraamanager.com https://sandbox.web.squarecdn.com https://web.squarecdn.com; font-src 'self' https://fonts.gstatic.com data: https://square-fonts-production-f.squarecdn.com https://d1g145x70srn7h.cloudfront.net; script-src 'self' 'unsafe-eval' 'nonce-$nonce' 'unsafe-hashes' 'sha256-47mKTaMaEn1L3m5DAz9muidMqw636xxw7EFAK/YnPdg=' https://js.stripe.com https://aiservice.yaraamanager.com https://www.gstatic.com https://www.google.com https://www.paypal.com https://checkout.razorpay.com https://sandbox.web.squarecdn.com https://web.squarecdn.com;  script-src-attr 'self' 'unsafe-hashes' 'sha256-47mKTaMaEn1L3m5DAz9muidMqw636xxw7EFAK/YnPdg='; frame-src https://js.stripe.com https://www.paypal.com https://api.razorpay.com https://sandbox.web.squarecdn.com https://web.squarecdn.com; object-src 'none';  frame-ancestors 'self' https://preview.codecanyon.net https://codecanyon.net;  base-uri 'self'; connect-src 'self' https://api.stripe.com https://aiservice.yaraamanager.com https://www.paypal.com https://api.razorpay.com https://sandbox.web.squarecdn.com https://web.squarecdn.com https://pci-connect.squareup.com https://pci-connect.squareupsandbox.com; media-src 'self' https://test-aiservice.yaraamanager.com;";
        // remove whitespace/newlines
        $csp = preg_replace('/\s+/', ' ', trim($csp));

        $response->headers->set('Content-Security-Policy', $csp);

        return $response;
    }
}
