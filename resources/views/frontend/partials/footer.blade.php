@php
$practice_Area = DB::table('practice_areas')->where('parent_id', null)->limit(4)->orderBy('id', 'asc')->get();
@endphp

<>