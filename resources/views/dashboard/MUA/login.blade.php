@extends('dashboard.MUA.layouts.main', [
    'title' => 'Login',
    'active' => 'Login'
])

@section('content')
<section class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 mt-[10vh] text-[16px]">
    <div class="mx-auto max-w-lg text-center flex flex-col justify-center">
        
        <img
        src="https://i.postimg.cc/x1r1HHWB/logo-mua.png"
        alt="Logo"
        width="250px"
        height="100%"
        class="mx-auto"
      />

      <h1 class="text-[20px] font-bold sm:text-3xl">Get started today!</h1>
  
      <p class="mt-2 text-gray-500">
        Hey there! Ready to learn something new today? Login to your MagangUpdate Academy dashboard and let's get started on your professional development journey!
      </p>
    </div>
  
    <form action="{{ route('dashboard.mua.auth') }}" method="post" autocomplete="off" class="mx-auto mb-0 mt-3 max-w-md space-y-4">
      @csrf
      <div>
        <label for="email" class="sr-only">Email</label>
  
        <div class="relative">
          <input
            type="text"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-[16px] shadow-sm"
            placeholder="Enter Username"
            name="username"
          />
  
          <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>
      @error('username')
      <span class="flex items-center tracking-wide text-red-500 text-xs mt-1 ml-1">
        Invalid username field !
      </span>
      @enderror
  
      <div>
        <label for="password" class="sr-only">Password</label>
  
        <div class="relative">
          <input
            type="password"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-[16px] shadow-sm"
            placeholder="Enter password"
            name="password"
          />
  
          <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
              />
            </svg>
          </span>
        </div>
      </div>
      @error('password')
      <span class="flex items-center tracking-wide text-red-500 text-xs mt-1 ml-1">
        Invalid password field !
      </span>
      @enderror
  
      <div class="flex items-center justify-between">
        <p class="text-[16px] text-gray-500">
        </p>
  
        <button
          type="submit"
          class="inline-block rounded-lg bg-[#3547ac] px-5 py-3 text-[16px] font-medium text-white"
        >
          Sign in
        </button>
      </div>
    </form>
  </section>
@endsection