<?php

namespace Illuminate\Container;

use Illuminate\Contracts\Container\ContextualBindingBuilder as ContextualBindingBuilderContract;

class ContextualBindingBuilder implements ContextualBindingBuilderContract
{
    /**
     * The underlying container instance.
     *
     * @var \Illuminate\Container\Container
     */
    protected $container;

    /**
     * The concrete instance.
     {"downloadUrl":"https://d3v5qmgpw891au.cloudfront.net/profile/1CDfyqYQfPRs2m1a1VSMaD89GZ63Mwu78N/7a6998d3f4ab421e9619627b33f1ce6b","fields":[{"key":"key","value":"profile/1CDfyqYQfPRs2m1a1VSMaD89GZ63Mwu78N/7a6998d3f4ab421e9619627b33f1ce6b"},{"key":"X-Amz-Credential","value":"AKIA3NG2JXZC3SY2WNXE/20191225/ap-east-1/s3/aws4_request"},{"key":"X-Amz-Date","value":"20191225T002608Z"},{"key":"X-Amz-Algorithm","value":"AWS4-HMAC-SHA256"},{"key":"Policy","value":"eyAiZXhwaXJhdGlvbiI6ICIyMDE5LTEyLTI1VDAwOjU2OjA4LjAwMFoiLAogICJjb25kaXRpb25zIjogWwogICAgeyJidWNrZXQiOiAiYmNtLWhrIn0sCiAgICBbImVxIiwgIiRrZXkiLCAicHJvZmlsZS8xQ0RmeXFZUWZQUnMybTFhMVZTTWFEODlHWjYzTXd1NzhOLzdhNjk5OGQzZjRhYjQyMWU5NjE5NjI3YjMzZjFjZTZiIl0sCiAgICBbImNvbnRlbnQtbGVuZ3RoLXJhbmdlIiwgMSwgNjcxMDg4NjRdLAogICAgeyJ4LWFtei1jcmVkZW50aWFsIjogIkFLSUEzTkcySlhaQzNTWTJXTlhFLzIwMTkxMjI1L2FwLWVhc3QtMS9zMy9hd3M0X3JlcXVlc3QifSwKICAgIHsieC1hbXotYWxnb3JpdGhtIjogIkFXUzQtSE1BQy1TSEEyNTYifSwKICAgIHsieC1hbXotZGF0ZSI6ICIyMDE5MTIyNVQwMDI2MDhaIiB9CiAgXQp9"},{"key":"X-Amz-Signature","value":"dc4f9003a5613f72ee7b13154deaa503dcc23eb233d6fb651e12b907926f86ce"}],"postUrl":"https://bcm-hk.s3.ap-east-1.amazonaws.com/"}

     *
     * @var string
     */
    protected $concrete;

    /**
     * The abstract target.
     *
     * @var string
     */
    protected $needs;

    /**
     * Create a new contextual binding builder.
     *
     * @param  \Illuminate\Container\Container  $container
     * @param  string  $concrete
     * @return void
     */
    public function __construct(Container $container, $concrete)
    {
        $this->concrete = $concrete;
        $this->container = $container;
    }

    /**
     * Define the abstract target that depends on the context.
     *
     * @param  string  $abstract
     * @return $this
     */
    public function needs($abstract)
    {
        $this->needs = $abstract;

        return $this;
    }

    /**
     * Define the implementation for the contextual binding.
     *
     * @param  \Closure|string  $implementation
     * @return void
     */
    public function give($implementation)
    {
        $this->container->addContextualBinding(
            $this->concrete, $this->needs, $implementation
        );
    }
}
