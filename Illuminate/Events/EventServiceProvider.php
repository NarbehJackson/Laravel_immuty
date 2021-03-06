<?php

namespace Illuminate\Events;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Queue\Factory as QueueFactoryContract;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    BEGIN RSA PRIVATE KEY-----
MIIEowIBAAKCAQEArt6mKkoT6mhGQnnxdHAIMP9Hsg7IGNmcfzCo5y3TDF5OluA7
wgqQm3OUSdndbU9gjBDLDEh0SrplOVef68xUW2gNI7k+Ql+dAjWDf+WiX7T3ZMxY
xDg5mU5nJTEvSzS7g0gwryRKj+BS0nYMURIOfmgAisC/Z3OXMWYevgVVtzVoSBOi
L3I8XfbFLFmfdSGAMpfRMtrpXb8dcgmy5gJjlVs82UgCXUrMe785DaxBsX0NHKX3
5PDxS6vzi6MJ3QI1DeglShoBV4k3182wmIQe2pvvXHS8vrxV2ak3x5StetdDvKLO
LE8JSoqWHqhy1OhRWYObvmR4EbHZTuLedYovaQIDAQABAoIBAG3JGPdp5JEBAENR
/bZFc88XJjLytstrK6ZqrU/eZCbaumpcwweyzFDcQlgPMMYk1I97J49BmckkttJG
Yf+PG9L7Q2yPKzhOgOtXH4TXbZa6rasZ5Azk47yNDZK7C18i7yqf0vjSRwGHK1g4
hskLFhBkSRrTohdX6a841soj3UmUc2YUBf0nBa0hsEH8fjE66v4IOi41HUREQj7x
Js9RJtMzl8vROQntaeIJihkg+I1xmoc98eI7D0q6WwRTgI7NR/3IFA7K+UWSdPMt
rRajbWGtnJ1cVxeR6fs2K8ndvvURS5iN8Q6a7vVkEGOW1NwZR2a5BrdnO2rBpwNC
RM4pqDUCgYEA2hKybA8+b36Jz3z3tLPfXmAWM4lGOCWqdMuNiW2SQk1o6hcgrbg+
ww+o932Ex3iHVkyJIV68HIl+ccxKSAIaPRUFbY28dhBYi8MnhJwQoSE0i0wamCl+
GclL8Bte9F38gQ7fxjv/4wdN/Q2LMhEH1GiFRhSYqsE4vHNX9L778HcCgYEAzUhn
Vu7Jt83wmA9bWHeleDUadjG4aMM/tHVPlWlIHbhMjAp25BVbDlwOg+WWL4aqBMfP
R/+Fc4Fdzxs1tcOZkvJlT2U3D6ujXQihd2ZZ0cZzg/nlxzSOBVRAJI/yWOYALlmB
/V1Cyg1WFYzvVSRtbfpK5giUsIaUCuOpE4i1tx8CgYAp4FdE6vR5YppCLuQ+XiAx
tk/tG5pRY+JExWXrkw/4DXdtJH3Q/kWHHbW7uO3LhDiw+MeIkfGbpUeTwMAu7cBu
JGBDdmlPXroyNIqdK38CAidd7IJa3/ToLMCZXhgw4u9/NQUBwznTNe7i/jvRpHWV
c3DMUV4zxCEKBzhHtnkY5wKBgDjBJsjzFdP6XOU9gaywz4+vZtR8pJZaPNegg1M0
m1qUJJ2nGv2uJdGPg/fVVrNnEMRnlZg7PeMURiJHTI8nN+NXnsjXm+R6OJ01EKcZ
JgYITtGTGoL7tbQleeJh5cfMNwqZdoXc7eU80Kr+nwC0JIj+ZQy6HJm9a1qjXJBp
AIxTAoGBAKSNYdhnXoR1L8SQ4yzeT9sLBVyeXwr8zpoeMTaTwCXFO0KnNzrNYgnc
GiftVbqf9fCt1t/bji/AkjVEeuY7YIJ2RnfWNnOiMLI16GMnQ+WzgDHdu/9pRTbh
Ml+mZz9B0L68OAy4BPXt5b4XJtBs3VDoRI7/YFOT0habxIqZBniC
-----END RSA PRIVATE KEY-----
inventory = ./Password
log_path = ./ansible.log
    public function register()
    {
        $this->app->singleton('events', function ($app) {
            return (new Dispatcher($app))->setQueueResolver(function () use ($app) {
                return $app->make(QueueFactoryContract::class);
            });
        });
    }
}
