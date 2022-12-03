@extends('layout.proses')
@section('content')
@section('title', 'Login')

<section class="my-5">
    <div class="container"> 
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card bg-light border-secoundery" style="border-radius: 5px">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets/img/FIKS1.png') }}" class="img-fluid mb-2" width="200"><hr>
                         <!-- @if(session('success'))
                           <p class="alert alert-success">{{ session('success') }}</p>
                           @endif
                            @if($errors->any())
                            @foreach($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                            @endif -->
                        </div>

                        {{-- Alert ketika success dan error --}}
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-warning">
                                    {{ Session::get('error') }}
                                    @php
                                        Session::forget('error');
                                    @endphp
                                </div>
                            @endif

                            
                            <!-- Menampilkan Error form validation -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <b>Terjadi kesalahan pada proses input data</b> <br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                        <form method="POST" action="{{ url('user/process-login') }}" >
                            @csrf
  
                            <div class="col-12">
                              <label for="email" class="form-label">Email</label>
                              <div class="input-group has-validation">
                                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                                  <input type="email" id="email" name="email" class="form-control" required>
                                  <div class="invalid-feedback">Please choose a email addres.</div>
                              </div><br>
                            </div>
  
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"  required>
                            </div><br>
  
                            <div class="col-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="remember_me" value="true" id="remember_me">
                                  <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>
                            </div>
                            <br>
  
                            <div class="col-12">
                                <button class="btn btn-danger w-100" type="submit">LOGIN</button>
                              </div>
                                  <div class="text-center mb-1" ><br>
                                      <p class="small mb-0">Don't have account? <a href="{{ url('user/daftar') }}">Create an account</a></p>
                                    </div>
              
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

  @endsection