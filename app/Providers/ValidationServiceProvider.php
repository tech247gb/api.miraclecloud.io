<?php

namespace App\Providers;

use App\Exceptions\NotValidTypeObjectExceptions;
use App\Infrastructure\Core\CommentClassEnum;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function boot()
    {
        $this->registerArrayEachIntValidator();
        $this->registerArrayEachStringValidator();
        $this->registerAlertEachEmailCCValidator();
    }

    private function registerArrayEachIntValidator()
    {
        $request = $this->app->request;
        Validator::extend('arrayInt', function ($attribute, $value, $parameters, $validator) use ($request) {
            if (!is_array($value)) {

                return false;
            }

            foreach ($value as $elem) {

                if (intval($elem) != $elem) {

                    return false;
                }
            }

            return true;
        });

        Validator::replacer('arrayInt', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be an array of integer values.');
        });
    }

    private function registerArrayEachStringValidator()
    {
        Validator::extend("arrayStrings", function($attribute, $value, $parameters) {

            if (!is_array($value)) {

                return false;
            }

            $rule = ['field' => 'required|string'];

            foreach ($value as $field) {

                $data = ['field' => $field];

                $validator = Validator::make($data, $rule);

                if ($validator->fails()) {
                    return false;
                }

            }

            return true;
        });

        Validator::replacer('arrayStrings', function ($message, $attribute, $rule, $parameters) {
            return str_replace(
                ':attribute',
                $attribute,
                'The :attribute must be an array of string values.');
        });
    }

    private function registerAlertEachEmailCCValidator()
    {
        Validator::extend("arrayAlertEmailsCC", function($attribute, $value, $parameters) {

            if (!is_array($value)) {

                return false;
            }

            if (count($value) > 10) {

                return false;
            }

            $rule = ['email' => 'required|email'];

            foreach ($value as $email) {

                $data = ['email' => $email];

                $validator = Validator::make($data, $rule);

                if ($validator->fails()) {
                    return false;
                }

            }

            return true;
        });

        Validator::replacer('arrayAlertEmailsCC', function ($message, $attribute, $rule, $parameters) {
            return str_replace(
                ':attribute',
                $attribute,
                'The :attribute must be an array of email values. Max 10 emails');
        });
    }
}
