@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                Create your donee account
            </h1>
            <h2 class="subtitle">Please provide your personal information to continue.</h2>

            <form action="{{ route('donees.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="field">
                    <label class="label">ID number (South African)*</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('id_number') ? 'is-danger' : '' }}"
                               name="id_number" value="{{ old('id_number') | 9503256074083 }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('id_number') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('id_number'))
                        <p class="help is-danger">{{ $errors->first('id_number') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Date of Birth*</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('dob') ? 'is-danger' : '' }}"
                               name="dob" value="{{ old('dob') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('dob') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('dob'))
                        <p class="help is-danger">{{ $errors->first('dob') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Gender*</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" value="m" name="gender" {{ old('gender') === 'm'?'checked':'' }} required>
                            Male
                        </label>
                        <label class="radio">
                            <input type="radio" value="f" {{ old('gender') === 'f'?'checked':'' }} name="gender">
                            Female
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Phone number*</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('phone_number') ? 'is-danger' : '' }}"
                               name="phone_number" value="{{ old('phone_number') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('phone_number') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('phone_number'))
                        <p class="help is-danger">{{ $errors->first('phone_number') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Address*</label>
                    <div class="control has-icons-right">
                        <textarea class="textarea {{ $errors->has('address') ? 'is-danger' : '' }}" name="address" rows="2" required>{{ old('address') }}</textarea>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('address') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('address'))
                        <p class="help is-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">City*</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('city') ? 'is-danger' : '' }}"
                               name="city" value="{{ old('city') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('city') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('city'))
                        <p class="help is-danger">{{ $errors->first('city') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Postal Code*</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('postal_code') ? 'is-danger' : '' }}"
                               name="postal_code" value="{{ old('city') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('postal_code') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('postal_code'))
                        <p class="help is-danger">{{ $errors->first('postal_code') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Province*</label>
                    <div class="control">
                        <div class="select">
                            <select name="province" required>
                                <option value="">Please select...</option>
                                @foreach(json_decode(app(\App\Donee::class)->provinces->toJson()) as $province)
                                    <option {{ $province->id == old('province')?'selected':'' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if ($errors->has('province'))
                        <p class="help is-danger">{{ $errors->first('province') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">ID Copy</label>
                    <div class="control">
                        <file name="id_file" accept="application/msword, application/pdf, image/*"></file>
                    </div>
                    @if ($errors->has('id_file'))
                        <p class="help is-danger">{{ $errors->first('id_file') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Matric Results</label>
                    <div class="control">
                        <file name="matric_results_file" accept="application/msword, application/pdf, image/*"></file>
                    </div>
                    @if ($errors->has('matric_results_file'))
                        <p class="help is-danger">{{ $errors->first('matric_results_file') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Write about yourself</label>
                    <div class="control has-icons-right">
                        <textarea class="textarea {{ $errors->has('about') ? 'is-danger' : '' }}"
                                  name="about" placeholder="Write about your self." rows="3">{{ old('about') }}</textarea>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('about') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('about'))
                        <p class="help is-danger">{{ $errors->first('about') }}</p>
                    @endif
                </div>



                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
