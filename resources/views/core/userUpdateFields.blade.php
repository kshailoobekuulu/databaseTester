@csrf
<div class="form-group">
    <label for="name">{{ __('messages.Name') }}</label> <br>
    <input class="form-control @error('name') border-danger @enderror" type="text" id="name" name="name" required
           value="{{ old('name') ?: $user->getName() }}">
    @error('name')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="surname">{{ __('messages.Surname') }}</label> <br>
    <input class="form-control @error('surname') border-danger @enderror" type="text" id="surname" name="surname"
           value="{{ old('surname') ?: $user->getSurname() }}">
    @error('surname')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="year">{{ __('messages.YearInUniversity') }}</label> <br>
    <input class="form-control @error('year') border-danger @enderror" type="text" id="year" name="year" required
           value="{{ old('year') ?: $user->getYear() }}">
    @error('year')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="email">{{ __('messages.E-MailAddress') }}</label> <br>
    <input class="form-control @error('email') border-danger @enderror" type="email" id="email" name="email" required
           value="{{ old('email') ?: $user->getEmail() }}">
    @error('email')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="phone_number">{{ __('messages.PhoneNumber') }}</label> <br>
    <input class="form-control @error('phone_number') border-danger @enderror" type="text" id="phone_number" name="phone_number"
           value="{{ old('phone_number') ?: $user->getMainPhoneNumber() }}">
    @error('phone_number')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="phone_number_two">{{ __('messages.AdditionalPhoneNumber') }}</label> <br>
    <input class="form-control @error('additional_phone_number') border-danger @enderror" type="text" id="phone_number_two" name="phone_number_two"
           value="{{ old('additional_phone_number') ?: $user->getAdditionalPhoneNumber() }}">
    @error('additional_phone_number')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="address">{{ __('messages.Address') }}</label> <br>
    <input class="form-control @error('address') border-danger @enderror" type="text" id="address" name="address"
           value="{{ old('address') ?: $user->getAddress() }}">
    @error('address')
    <small id="emailHelp" class="text-danger">{{ $message }}</small>
    @enderror
</div>
@if($admin)
    <div class="form-group">
        <label for="role">{{ __('messages.Roles') }}</label>
        <select name="role" id="role" class="form-control @error('role') border-danger @enderror">
            @foreach($roles as $role)
                <option value="{{ $role->getId() }}" @if($role->getId() == $user->role->getId()) selected @endif>{{ __($role->getTranslation()) }}</option>
            @endforeach
        </select>
        @error('role')
        <small class="text-danger">
            {{ $message }}
        </small>
        @enderror
    </div>
@endif

<button type="submit" class="btn btn-success">{{ __('messages.Save') }}</button>
<a href="{{ $cancelRoute }}" class="btn btn-danger">{{ __('messages.Cancel') }}</a>
