@extends('shared.index')
@section('content')
    <h3>Your GitHub Repositories:</h3><hr>
    <div id="git-accordion" role="tablist" aria-multiselectable="true">
        @for ($i = 0; $i < count($data); $i++)
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a data-toggle="collapse" data-parent="#git-accordion" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $data[$i]['name'] }}
                        </a>
                    </h5>
                </div>
                <div id="collapse{{$i}}" class="collapse {{ $i == 0 ? 'in' : '' }}" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        <p>Description: {{ $data[$i]['description'] }}</p>
                        <p>Open Issues: {{ $data[$i]['open_issues'] }}</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection