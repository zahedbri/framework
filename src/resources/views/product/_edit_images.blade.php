    <div class="card card-accent-secondary">
        <div class="card-header">{{ __('Images') }} <span
                    class="badge badge-pill badge-info">{{ $product->getMedia()->count() }}</span>
        </div>
        <div class="card-block">
            @forelse($product->getMedia() as $media)
                <div class="card">
                    <div class="card-body p-0 d-flex align-items-center">
                        <img class="mr-3 w-25" src="{{ $media->getUrl('thumbnail') }}"
                             alt="{{ $media->name }}" title="{{ $media->name }}">
                        <div class="w-50">
                            <div class="text-sm-left text-info font-weight-bold">
                                <span title="{{ $media->getPath() }}">{{ $media->human_readable_size }}</span>
                            </div>
                            <div class="text-muted text-uppercase font-weight-bold small">
                                <a href="{{ $media->getUrl() }}" title="{{ $media->getUrl() }}"
                                   target="_blank"><i class="zmdi zmdi-link"></i></a>
                            </div>
                        </div>
                        <div class="w-25 p-2 b-l-1">
                            <div class="align-content-center text-center">
                                @can('delete media')
                                    {!! Form::open(['route' => ['vanilo.media.destroy', $media], 'method' => 'DELETE', 'class' => "float-right"]) !!}
                                    <button class="btn btn-sm btn-outline-danger" title="{{ __('Delete image') }}">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                    {!! Form::close() !!}
                                @endcan
                            </div>
                        </div>

                    </div>

                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary">{{ __('No image') }}</div>
                </div>
            @endforelse

            @can('create media')
                {!! Form::open(['route' => 'vanilo.media.store', 'enctype'=>'multipart/form-data', 'class' => 'card']) !!}
                    <div class="card-body p-0 d-flex align-items-center">
                        <div class="w-75 p-2">
                            {{ Form::hidden('forType', 'product') }}
                            {{ Form::hidden('forId', $product->id) }}

                            {{ Form::file('images[]', ['multiple']) }}
                        </div>
                        {{--<i class="zmdi zmdi-collection-plus font-2xl mr-3 bg-success p-3"></i>--}}
                        <div class="w-25 p-2 bg-success">
                            <div class="align-content-center text-center">
                                <button class="btn btn-sm btn-success" title="{{ __('Upload image(s)') }}">
                                    <i class="zmdi font-2xl zmdi-collection-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            @endcan
        </div>
    </div>
