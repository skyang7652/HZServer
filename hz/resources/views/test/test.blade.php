@extends('layouts.master')

@section('content')

	{!!$myfile = fopen("testfile.txt", "w")!!}
	{!!$write= json_encode($test)!!}
    {!!fwrite($myfile, $write);!!}
	{!!fclose($myfile)!!}
@endsection