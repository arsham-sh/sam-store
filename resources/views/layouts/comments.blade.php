   @foreach ($comments as $comment)
       <div class="container">
           <div class="bg-light border border-secondary-subtle rounded-5 p-4 mb-5">
               <div class="">
                   <h6>{{ $comment->user->name }} : </h6>
               </div>
               <div class="">
                   <p>
                       {{ $comment->comment }}
                   </p>

                   <div class="d-flex">
                       <div class="">
                           @auth
                               <a href="#" class="text-decoration-none" data-bs-toggle="modal"
                                   data-bs-target="#exampleModal" data-id="{{ $comment->id }}">
                                   <i class="fa fa-reply fs-5 text-muted"></i>
                               </a>
                           @endauth
                       </div>

                       <div class="me-auto">
                           <span class="text-muted fs-7">{{ jdate($comment->created_at)->ago() }}</span>
                       </div>
                   </div>

               </div>


               @include('layouts.comments', ['comments' => $comment->child->where('approved', 1)])

           </div>
       </div>
   @endforeach

   @section('script')
       <script>
           const exampleModal = document.getElementById('exampleModal')
           if (exampleModal) {
               exampleModal.addEventListener('show.bs.modal', event => {
                   const button = event.relatedTarget

                   let parent_id = button.dataset.id || null;
                   var modal = this;

                   const modalBodyInput = exampleModal.querySelector('input[name="parent_id"]');
                   modalBodyInput.value = parent_id

               })
           }
       </script>
   @endsection
