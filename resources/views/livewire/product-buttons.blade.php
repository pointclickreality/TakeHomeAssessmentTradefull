<div>
    @if($action != 'viewHome')
        <button
            type="button"
            class="btn btn-dark"
            wire:click="resetResults()"
            data-bs-toggle="tooltip"
            data-bs-custom-class="tooltip-inverse"
            data-bs-placement="top"
            title="Use this button to go back to home or reset component to default status at any time"

        >
            <i class="fa fa-home fs-4 me-2"></i>
            Home
        </button>
    @endif
    @if($action != 'createProduct' && $migrationTable)
        <button type="button"
                class="btn btn-success"
                wire:click="createProduct()"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="This button allows you to quickly create new NFT Products"
        >
            <i class="bi bi-images fs-2 me-1"></i>
            Create Product
        </button>
    @endif
    @if($product && $action == 'viewProduct')
        <button type="button"
                class="btn btn-info"
                wire:click="increaseLikes({{$product->id}})"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="Like This Product {{$product->name}}"
        >
            <i class="bi bi-heart fs-2 me-1"></i>
            {{$product->likes}}
        </button>
        <button type="button"
                class="btn btn-danger"
                wire:click="increaseDislikes({{$product->id}})"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="Like This Product {{$product->name}}"
        >
            <i class="bi bi-hand-thumbs-down fs-2 me-1"></i>
            {{$product->dislikes}}
        </button>
    @endif
    @if($product && $action == 'viewProduct')
        <button type="button"
                class="btn btn-warning"
                wire:click="editProduct({{$product->id}})"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="Edit Product {{$product->name}}"
        >
            <i class="bi bi-vector-pen fs-4 me-2"></i>
            Edit
        </button>
        <button type="button"
                class="btn btn-info"
                wire:click="viewUserProfile({{$product->user->id}})"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="View More Products {{$product->user->name}}"
        >
            <i class="bi bi-person fs-4 me-2"></i>
            More Products
        </button>
        <button type="button"
                class="btn btn-danger"
                wire:click="deleteProduct({{$product->id}})"
                data-bs-toggle="tooltip"
                data-bs-custom-class="tooltip-inverse"
                data-bs-placement="top"
                title="Delete Product {{$product->name}}"
        >
            <i class="bi bi-trash fs-4 me-2"></i>
            Delete
        </button>
        <hr/>
        <div class="btn-group btn-group-justified">
            <a href="{{route('products.show', $product->id)}}"
               class="btn btn-dark"

            >
                <i class="bi bi-eye fs-4 me-2"></i>
                Show via Route
            </a>
            <a href="{{route('products.edit', $product->id)}}"
               class="btn btn-dark"

            >
                <i class="bi bi-pen fs-4 me-2"></i>
                Edit via Route
            </a>
            <a href="{{route('users.show', $product->user->id)}}"
               class="btn btn-dark"

            >
                <i class="bi bi-person fs-4 me-2"></i>
                Profile via Route
            </a>
        </div>
    @endif
    <hr/>
</div>
