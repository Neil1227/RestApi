@if(isset($counts))
    <div class="row mt-5 mb-5">
        @foreach ($counts as $key => $count)
            <div class="col-md-2">
                <div class="summary-card card{{ $loop->iteration }}">
                    <h5>{{ strtoupper($key) }}</h5>
                    <div class="summary-card-content">
                        <p>{{ $count }}</p>
                        <i class="fa fa-desktop"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>0</p>
@endif
