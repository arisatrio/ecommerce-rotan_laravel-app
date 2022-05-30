<div>
    <form action="{{ $route }}" method="{{ $method }}" enctype="multipart/form-data">
        {{ $csrf }}
        
        <div class="card-body">
            {{ $formContent }}
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
        </div>

    </form>
</div>