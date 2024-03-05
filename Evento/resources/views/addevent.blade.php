@extends('layouts.main') 

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="date">{{ __('Date') }}</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="local">{{ __('Location') }}</label>
                            <input type="text" id="local" name="local" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('Image') }}</label>
                            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                        </div>

                        <div class="form-group">
                            <label for="acceptation">{{ __('Acceptation') }}</label>
                            <select id="acceptation" name="acceptation" class="form-control" required>
                                <option value="1">{{ __('Auto') }}</option>
                                <option value="0">{{ __('Manuelle') }}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('Create Event') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
