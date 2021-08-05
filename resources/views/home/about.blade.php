@extends('layouts.app')

@section('title')
About us | Application
@endsection

@section('content')

<div class="container main-container">
  <h2 class="page-header text-primary">About Us page</small></h2>
  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="{{url('/assets/images/about.jpg')}}" alt="Generic placeholder image" width="100%">
        <h2>What we have to solve.</h2>
        <p>The median income of a U.S household is $68,703. Many things in the U.S are extremely expensive. One thing that can be extravagantly costly for students is sports recruiting. Considering the current national median income, other sports recruiting websites are simply too expensive for the “average” American family to afford. Many families in America are below this average, making this even more difficult to afford. This is only worse when a high schooler does not have extra support in this journey. This creates a discriminatory college recruiting system: an issue we hope to solve</p>
      </div><!-- /.col-lg-4 -->
  </div>
</div>
@endsection