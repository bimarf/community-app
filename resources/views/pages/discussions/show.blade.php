@extends('layouts.app')

@section('body')
    <section class="bg-gray pt-4 pb-5">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">Discussions</div>
                        <div class="fs-2 fw-bold color-gray me-2 mb-0">></div>
                    </div>
                    <h2 class="mb-0">{{ $discussion->title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 mb-5 mb-lg-0">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                <a id="discussion-like" href="javascript:;">
                                    <img src="{{ $discussion->liked() ? $likedImage : $notLikedImage }}" alt="Like"
                                        id="discussion-like-icon" class="like-icon mb-1">
                                </a>
                                <span id="discussion-like-count"
                                    class="fs-4 color-gray mb-1">{{ $discussion->likeCount }}</span>
                            </div>
                            <div class="col-11">
                                <p>
                                    {!! $discussion->content !!}
                                </p>
                                <div class="mb-3">
                                    <a href="{{ route('discussions.categories.show', $discussion->category->slug) }}"><span
                                            class="badge rounded-pill text-bg-light">{{ $discussion->category->name }}</span></a>

                                </div>
                                <div class="row align-items-start justify-content-between">
                                    <div class="col">
                                        <span class="color-gray me-2">
                                            <a href="#" id="share-discussion">Share</a>
                                            <input type="text" value="{{ route('discussions.show', $discussion->slug) }}"
                                                id="current-url" class="d-none">
                                        </span>

                                        @if ($discussion->user_id === auth()->id())
                                            <span class="color-gray me-2">
                                                <a href="{{ route('discussions.edit', $discussion->slug) }}">
                                                    <small>Edit</small>
                                                </a>
                                            </span>

                                            <form action="{{ route('discussions.destroy', $discussion->slug) }}"
                                                class="d-inline-block lh-1" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="color-gray btn p-0 lh-1"
                                                    id="delete-discussion">
                                                    <small class="card-discussion-delete-btn">Delete</small>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="col-5 col-lg-3 d-flex">
                                        <a href="#"
                                            class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                            <img src="{{ filter_var($discussion->user->picture, FILTER_VALIDATE_URL)
                                                ? $discussion->user->picture
                                                : Storage::url($discussion->user->picture) }}"
                                                alt="{{ $discussion->user->username }}" class="avatar">
                                        </a>
                                        <div class="fs-12px lh-1">
                                            <span class="text-gray">
                                                <a href="#" class="fw-bold d-flex align-items-start text-break mb-1">
                                                    {{ $discussion->user->username }}
                                                </a>
                                            </span>
                                            <span class="color-gray">{{ $discussion->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-5">
                        2 Answers
                    </h3>

                    <div class="mb-5">
                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a id="discussion-like" href="javascript:;" data-liked={{ $discussion->liked() }}>
                                        <img src="{{ url('assets/images/like.png') }}" alt="Like"
                                            id="discussion-like-icon" class="like-icon mb-1">
                                    </a>
                                    <span id="discussion-like-count" class="fs-4 color-gray mb-1">3</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero voluptatibus qui
                                        ducimus. Ab magnam tempore voluptas fugit tenetur, maiores natus illum ad! Eaque,
                                        perferendis? Praesentium veniam cum a repellendus similique!
                                    </p>

                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="#"
                                                class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar-2.png') }}" alt="bimargg"
                                                    class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-gray">
                                                    <a href="#"
                                                        class="fw-bold d-flex align-items-start text-break mb-1">
                                                        bimargg
                                                    </a>
                                                </span>
                                                <span class="color-gray">5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-discussions">
                            <div class="row">
                                <div class="col-1 d-flex flex-column justify-content-start align-items-center">
                                    <a id="discussion-like" href="javascript:;">
                                        <img src="{{ url('assets/images/liked.png') }}" alt="Like"
                                            id="discussion-like-icon" class="like-icon mb-1">
                                    </a>
                                    <span id="discussion-like-count" class="fs-4 color-gray mb-1">3</span>
                                </div>
                                <div class="col-11">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero voluptatibus qui
                                        ducimus. Ab magnam tempore voluptas fugit tenetur, maiores natus illum ad! Eaque,
                                        perferendis? Praesentium veniam cum a repellendus similique!
                                    </p>

                                    <div class="row align-items-end justify-content-end">
                                        <div class="col-5 col-lg-3 d-flex">
                                            <a href="#"
                                                class="card-discussions-show-avatar-wrapper flex-shrink-0 rounded-circle overflow-hidden me-1">
                                                <img src="{{ url('assets/images/avatar-2.png') }}" alt="bimargg"
                                                    class="avatar">
                                            </a>
                                            <div class="fs-12px lh-1">
                                                <span class="text-gray">
                                                    <a href="#"
                                                        class="fw-bold d-flex align-items-start text-break mb-1">
                                                        bimargg
                                                    </a>
                                                </span>
                                                <span class="color-gray">5 hours ago</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        <h3 class="mb-5">
                            Your Answer
                        </h3>
                        <div class="card card-discussions">
                            <form action="{{ route('discussions.answer.store', $discussion->slug) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="answer" id="answer">{{ old('answer') }}</textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary me-4" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    @endauth
                    @guest
                        <div class="fw-bold text-center">Please <a href="{{ route('login') }}" class="text-primary">
                                sign in</a> or <a href="{{ route('sign-up') }}" class="text-primary">
                                create an account</a> to participate in this discussion.
                        </div>
                    @endguest

                </div>
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <h3>All Categories</h3>
                        <div>
                            @foreach ($categories as $category)
                                <a href="{{ route('discussions.categories.show', $category->slug) }}">
                                    <span class="badge rounded-pill text-bg-light">{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#answer').summernote({
                placeholder: 'Write your solution here',
                tabSize: 2,
                height: 220,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']],
                ]
            });

            $('span.note-icon-caret').remove();

            $("#share-discussion").on('click', function() {
                var copyText = $('#current-url');

                copyText[0].select();
                copyText[0].setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText[0].value);

                var alert = $('#alert');
                alert.removeClass('d-none');

                var alertContainer = alert.find('.container');
                alertContainer.first().text("Link copied to clipboard");
            })

            $('#discussion-like').click(function() {
                var isLiked = $(this).data('liked');
                var likeRoute = isLiked ? '{{ route('discussions.like.unlike', $discussion->slug) }}' :
                    '{{ route('discussions.like.like', $discussion->slug) }}';

                $.ajax({
                        method: 'POST',
                        url: likeRoute,
                        data: {
                            '_token': '{{ csrf_token() }}'
                        }
                    })
                    .done(function(res) {
                        if (res.status === 'success') {
                            $('#discussion-like-count').text(res.data.likeCount);

                            if (isLiked) {
                                $('#discussion-like-icon').attr('src', '{{ $notLikedImage }}');
                            } else {
                                $('#discussion-like-icon').attr('src', '{{ $likedImage }}');
                            }

                            $('#discussion-like').data('liked', !isLiked);
                        }
                    })
            });

            $('#delete-discussion').click(function(event) {
                if (!confirm('Delete this discussion?')) {
                    event.preventDefault();
                }
            });

            $('.delete-answer').click(function(event) {
                if (!confirm('Delete this answer?')) {
                    event.preventDefault();
                }
            });
        })
    </script>
@endsection
