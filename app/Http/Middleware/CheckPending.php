<?php

namespace App\Http\Middleware;

use Closure;
use App\Course;

class CheckPending
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $courseId = $request->route('id');

        $course = Course::find($courseId);

        if($course->status === 'pending'){
            return redirect('instructor/mycourses');
        }

        return $next($request);
    }
}
