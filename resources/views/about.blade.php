@extends('layouts.site')
@section('content')
<div id="content">

<div id="left">
       {!!$z!!}
</div> <!-- close form -->
</div> <!-- close left -->

<div id="right">

<div id="searchbox">

<p>
     <input type="text" name="T1" style="width:200px;padding:4px;" /><br />
     <input type="submit" value="Search" name="B1" style="width: 210px;padding:4px;" />
 </p>

</div> <!-- close searchbox -->

{!!$m2!!}
</div> <!-- close right -->

<div class="spacer"></div>

</div> <!-- close content -->
@endsection
