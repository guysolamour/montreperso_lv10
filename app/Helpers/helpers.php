<?php


if (!function_exists('get_month')) {
    function get_month(\Carbon\Carbon $date, bool $longFormat = false)
    {
        $date_fr = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet',
            'Août','Septembre','Octobre','Novembre','Décembre'];

        return !$longFormat ? \Illuminate\Support\Str::limit($date_fr[$date->format('n') - 1],3,'') : $date_fr[$date->format('n') - 1];
    }
}


if (!function_exists('get_current_month')) {
    function get_current_month(bool $longFormat = false)
    {
        $date = now();

        $date_fr = ['Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet',
            'Août','Septembre','Octobre','Novembre','Décembre'];
        return !$longFormat ? \Illuminate\Support\Str::limit($date_fr[$date->format('n') - 1],3,'') : $date_fr[$date->format('n') - 1];

    }
}

if (!function_exists('get_day')) {
    function get_day(\Carbon\Carbon $date)
    {
        $date_fr = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
        return $date_fr[$date->format('N') - 1];

    }
}

if (!function_exists('get_full_date')) {
    function get_full_date(?\Carbon\Carbon $date = null) :string
    {
        // Jeudi 30 Octobre 2018

        $date = is_null($date) ? now() : $date;
        $day = get_day($date);
        $day_int = $date->format('d');
        $month = get_month($date,true);
        $year = $date->format('Y');

        return sprintf('%s %d %s %d',$day,$day_int,$month,$year);
    }
}


if (!function_exists('format_date')) {
    /**
     * @param \Carbon\Carbon $date
     * @param null|string $format
     * @return string
     */
    function format_date(\Carbon\Carbon $date, ?string $format = null)
    {
        $format ??= config('administrable.format_date', 'd/m/Y H:i');

        return $date->format($format);
    }
}


if (!function_exists('get_admin')) {
   /**
     * @param string|null $field
     * @return \App\Models\Admin|mixed
     */
    function get_admin(?string $field = null) {
        if ( is_null( $field ) ) {
            return auth('admin')->user();
        }

        return auth('admin')->user()->$field;
    }
}


if (!function_exists('get_user')) {
   /**
     * @param string|null $field
     * @return \App\Models\User|mixed
     */
    function get_user(?string $field = null) {
        if ( is_null( $field ) ) {
            return auth()->user();
        }

        return auth()->user()->$field;
    }

}


