@extends('templates.contact_template')
@section('content')
    @include('templates.navbar_template')

    <div class="container-contact">
        <div class="header">
            <p>Let us know if you have questions.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col">
                <!-- Image on the left side -->
                <img src="images/contactus.png" alt="Image" class="img-fluid">
            </div>
            <div class="col">
                <h2 class="fw-bold mb-5">Leave a message</h2>
                <form action="{{ route('inquiry.store') }}" method="POST"  id="contactForm">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form4Example1" class="form-control" />
                        <label class="form-label" for="form4Example1">Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form4Example2" class="form-control" />
                        <label class="form-label" for="form4Example2">Email address</label>
                    </div>
                    <div class="form-outline mb-4">
                        <textarea class="form-control" name="message" id="form4Example3" rows="4"></textarea>
                        <label class="form-label" for="form4Example3">Message</label>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">
                        SEND
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function showSuccessMessage() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message has been sent successfully.',
            });
        }

        document.getElementById('contactForm').addEventListener('submit', function (event) {
            event.preventDefault(); 

            showSuccessMessage();
        });
    </script> --}}
    @include('templates.sweetalert')

@endsection
