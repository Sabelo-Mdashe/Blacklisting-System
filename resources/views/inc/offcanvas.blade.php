<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Edit Profile</h5>
        <i type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="fs-3 fa-solid fa-square-xmark"></i>
    </div>
    <div class="offcanvas-body mt-5">
        <form action="update/{{Auth::id()}}" method="POST" @class(['d-flex', 'flex-column', 'gap-3'])>
            <div @class(['form-group'])>
                <label for="name">Username:</label>
                <input type="text" name="username" @class(['form-control']) value="{{ Auth::user()->name }}">
            </div>
            <div @class(['form-group'])>
                <label for="email">Email:</label>
                <input type="email" name="email" @class(['form-control']) value="{{ Auth::user()->email }}">
            </div>
            @method('PATCH')
            @csrf
            <button class="btn btn-success mt-3 me-md-2" type="submit">Update Profile</button>
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
</style>