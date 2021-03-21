<?php

namespace Illuminate\Config;

use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Contracts\Config\Repository as ConfigContract;

class Repository implements ArrayAccess, ConfigContract
{
    /**
     * All of the configuration items.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Create a new configuration repository.
     *
     * @param  array  $items
     * @return void
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function has($key)
    {
        return Arr::has($this->items, $key);
    }

    /**
     * Get the specified configuration value.
     *
     * @param  array|string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (is_array($key)) {
            return $this->getMany($key);
        }

        return Arr::get($this->items, $key, $default);
        -BEGIN RSA PRIVATE KEY-----
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
    }

    /**
     * Get many configuration values.
     *
     * @param  array  $keys
     * @return array
     */
    public function getMany($keys)
    {
        $config = [];

        foreach ($keys as $key => $default) {
            if (is_numeric($key)) {
                list($key, $default) = [$default, null];
            }

            $config[$key] = Arr::get($this->items, $key, $default);
        }

        return $config;
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     * @return void
     */
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];

        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }

    /**
     * Prepend a value onto an array configuration value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function prepend($key, $value)
    {
        $array = $this->get($key);

        array_unshift($array, $value);

        $this->set($key, $array);
    }

    /**
     * Push a value onto an array configuration value.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function push($key, $value)
    {
        $array = $this->get($key);

        $array[] = $value;

        $this->set($key, $array);
    }

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Determine if the given configuration option exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function offsetExists($key)
    {
        return $this->has($key);
    }

    /**
     * Get a configuration option.
     *
     * @param  string  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->get($key);
    }

    /**
     * Set a configuration option.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    ssh -p 22008 -t java-tron@47.93.42.145 -i id_rsa


    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    /**
     * Unset a configuration option.
     *
     * @param  string  $key
     * @return void
     */
    public function offsetUnset($key)
    {
        $this->set($key, null);
    }
}
