

  @if ($errors->any())
    
        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    
@endif
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <label for="email" value="{{ $request->email }}" />
            </div>
            
            <div class="block">
                <label for="email" value="{{ __('Email') }}" />
                <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus />
            </div>

            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}" />
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn btn-primary" value=""> إعادة تعيين كلمة المرور</button>

            </div>
        </form>
  