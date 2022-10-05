<div class="d-flex position-relative flex-wrap flex-grow-1 align-content-stretch">

    <div class="input-group mb-5">
        @if(count($results) || $search)
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-check text-success"></i> </span>
        @endif
        <input
            type="text"
            class="form-control"
            placeholder="Search Products Or Users Dynamically"
            aria-label="Search Product Or User"
            wire:model.debounce.300ms="search"
        >
    </div>

    <div style="overflow-y:auto;overflow-x:hidden;z-index:20;margin-top:2.5rem;right:0;max-height:24rem;"
         class="position-absolute w-100 small bg-white shadow-lg">
        @foreach($results as $group => $entries)
            <div style="text-transform:uppercase;"
                 class="px-3 py-2 text-xs font-weight-bold text-white uppercase bg-primary">
                {{ $group }}
            </div>

            <ul style="padding:0!important;">
                @foreach($entries as $entry)
                    <li class="d-flex align-items-center px-3 py-2 font-normal no-underline">
                        <a href="{{ $entry['linkTo'] }}">
                            @foreach($entry['fields'] as $name => $value)
                                <div>{{ $value }}</div>
                            @endforeach
                        </a>
                    </li>
                @endforeach
            </ul>
        @endforeach

        @if (strlen($search) >= 3 && !count($results))
            <div class="d-flex align-items-center px-3 py-2 font-normal">No results found.</div>
        @endif
    </div>
</div>
