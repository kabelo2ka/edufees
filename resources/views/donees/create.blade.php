@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">
                Create your donee account
            </h1>
            <h2 class="subtitle">Please provide your personal information to continue.</h2>

            <form action="" enctype="multipart/form-data">
                <div class="field">
                    <label class="label">ID number (South African)</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('id_number') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('id_number') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('id_number') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('id_number'))
                        <p class="help is-danger">{{ $errors->first('id_number') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Date of Birth</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('dob') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('dob') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('dob') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('dob'))
                        <p class="help is-danger">{{ $errors->first('dob') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Gender</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="gender" required>
                            Male
                        </label>
                        <label class="radio">
                            <input type="radio" name="gender">
                            Female
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Cell number</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('id_number') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('id_number') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('id_number') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('id_number'))
                        <p class="help is-danger">{{ $errors->first('id_number') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Address</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('address') ? 'is-danger' : '' }}"
                               name="postal_code" value="{{ old('address') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('address') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('address'))
                        <p class="help is-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">City</label>
                    <div class="control has-icons-right">
                        <input type="text" class="input {{ $errors->has('city') ? 'is-danger' : '' }}"
                               name="gross_amount" value="{{ old('city') }}" required>
                        <span class="icon is-small is-right">
                            <i class="fa {{ $errors->has('city') ? 'fa-warning' : 'fa-check' }}"></i>
                        </span>
                    </div>
                    @if ($errors->has('city'))
                        <p class="help is-danger">{{ $errors->first('city') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Postal Code</label>
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
                    <label class="label">Province</label>
                    <div class="control">
                        <div class="select">
                            <select name="province" required>
                                <option>Please select...</option>
                                @php
                                    $provinces = json_decode(json_encode([
                                        ['id'=>1, 'name'=>'Eastern Cape'],
                                        ['id'=>2, 'name'=>'Free State'],
                                        ['id'=>3, 'name'=>'Gauteng'],
                                        ['id'=>4, 'name'=>'KwaZulu-Natal'],
                                        ['id'=>5, 'name'=>'Limpopo'],
                                        ['id'=>6, 'name'=>'Mpumalanga'],
                                        ['id'=>7, 'name'=>'North West'],
                                        ['id'=>8, 'name'=>'Northern Cape'],
                                        ['id'=>9, 'name'=>'Western Cape'],
                                    ]));
                                @endphp
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                        <div class="file has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="id_file">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">Choose a file…</span>
                                </span>
                                    <span class="file-name"> Screen Shot 2017-07-29 at 15.54.25.png </span>
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('id_file'))
                        <p class="help is-danger">{{ $errors->first('id_file') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Matric Results</label>
                    <div class="control">
                        <div class="file has-name">
                            <label class="file-label">
                                <input class="file-input" type="file" name="matric_results_file">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    <span class="file-label">Choose a file…</span>
                                </span>
                                <span class="file-name"> Screen Shot 2017-07-29 at 15.54.25.png </span>
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('matric_results_file'))
                        <p class="help is-danger">{{ $errors->first('matric_results_file') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">Write about yourself</label>
                    <div class="control has-icons-right">
                        <textarea class="textarea {{ $errors->has('about') ? 'is-danger' : '' }}"
                                  placeholder="Write about your self." rows="3">{{ old('about') }}</textarea>
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
                        <button class="button is-link">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
