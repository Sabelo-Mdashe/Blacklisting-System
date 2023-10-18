<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit Profile</h5>
        <i type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="fs-3 fa-solid fa-square-xmark"></i>
    </div>
    <div class="offcanvas-body mt-1">
        <form action="/update/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data" @class(['d-flex', 'flex-column', 'gap-3'])>
            <div @class(['form-group'])>
                <img @class(['profile-avatar', 'form-control']) src="{{ url('/') }}/storage/avatars/{{ Auth::user()->avatar }}" alt="">
                {{-- <button >Upload Avatar</button> --}}
                <input type="file" name="avatar" @class(['form-control', 'mt-2']) >
            </div>
            <div @class(['form-group'])>
                <label for="name">Username:</label>
                <input type="text" name="username" @class(['form-control']) value="{{ Auth::user()->name }}">
            </div>
            <div @class(['form-group'])>
                <label for="email">Email:</label>
                <input type="email" name="email" @class(['form-control']) value="{{ Auth::user()->email }}">
            </div>
            @method('PUT')
            @csrf
            <button class="btn btn-success mt-3 me-md-2" type="submit">Update Profile</button>
        </form>

        <form action="/delete/{{ Auth::user()->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button @class(['btn', 'btn-danger', 'mt-3', 'me-md-2', 'form-control']) type="submit">Delete Profile</button>
        </form>
    </div>
</div>

<style>
    .offcanvas-title {
        text-transform: uppercase;
    }

    .btn-success {
        background-color: darkgreen!important;
    }

    .btn-danger {
        background-color: crimson!important;
    }

    .profile-avatar {
        /* border-radius: 50%; */
        /* width: ; */
    }
</style>