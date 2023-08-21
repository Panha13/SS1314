@foreach ($slideshows as $index => $slideshow)
    <tr class="slideshow-row">
        <td>{{ ($slideshows->currentPage() - 1) * $slideshows->perPage() + $loop->iteration }}</td>
        <td><img src={{ URL::asset('images/slideshows/thumbnail/' . $slideshow->img) }}></td>
        <td class="text-sm-short">{{ $slideshow->title }}</td>
        <td class="text-sm-short">{{ $slideshow['subtitle'] }}</td>
        <td class="text-short">{{ $slideshow->text }}</td>
        <td>{{ $slideshow->link }}</td>
        <td>
            {{-- Toggle eye of open --}}
            <a class="text-decoration-none" href="javascript:void(0)" data-id="{{ $slideshow['ssid'] }}"
                data-action="{{ $slideshow['enable'] }}" data-page="{{ $slideshows->currentPage() }}"
                onclick="toggleSlideshow(this)">
                <i class="align-middle" data-feather="{{ $slideshow['enable'] == 1 ? 'eye' : 'eye-off' }}"></i>                   
            </a>
            {{-- Move up and move down --}}
            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '1', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                <i class="align-middle" data-feather="arrow-up"></i>
            </a>
            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '0', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                <i class="align-middle" data-feather="arrow-down"></i>
            </a>
            {{-- Delete slideshow --}}
            <a class="text-decoration-none delete" href="#" data-id="{{ $slideshow['ssid'] }}" onclick="deleteSlideshow({{ $slideshow['ssid'] }})">
                <i class="align-middle" data-feather="trash"></i>
            </a>

            {{-- Edit Form --}}
            <a class="text-decoration-none"
                href="{{ route('admin.slideshow.edit', ['id' => $slideshow['ssid']]) }}">
                <i class="align-middle" data-feather="edit"></i>
            </a>
        </td>
    </tr>
    
@endforeach

