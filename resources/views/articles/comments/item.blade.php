
<div class="card-body p-4">
    <div class="d-flex flex-start">
        <div>
            <h6 class="fw-bold mb-1"> {{ $comment->email }} </h6>
            <div class="d-flex align-items-center mb-3">
                <p class="mb-0">
                    {{ $comment->pivot->updated_at->diffForHumans() }}
                </p>

            </div>
            <p class="mb-0">
                {{ $comment->pivot->comment }}
            </p>
        </div>
    </div>
</div>
