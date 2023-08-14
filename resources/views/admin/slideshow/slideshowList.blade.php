@foreach ($slideshows as $index => $slideshow)
    <tr>
        <td>{{ ($slideshows->currentPage() - 1) * $slideshows->perPage() + $loop->iteration }}</td>
        <td><img src={{ URL::asset('images/slideshows/thumbnail/' . $slideshow->img) }}></td>
        <td>{{ $slideshow->title }}</td>
        <td>{{ $slideshow['subtitle'] }}</td>
        <td>{{ $slideshow->text }}</td>
        <td>{{ $slideshow->link }}</td>
        <td>
            <a class="text-decoration-none" href="javascript:void(0)" data-id="{{ $slideshow['ssid'] }}"
                data-action="{{ $slideshow['enable'] }}" data-page="{{ $slideshows->currentPage() }}"
                onclick="toggleSlideshow(this)">
                <i class="align-middle"
                    data-feather="{{ $slideshow['enable'] == 1 ? 'eye' : 'eye-off' }}"></i>
            </a>

            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '1', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                <i class="align-middle" data-feather="arrow-up"></i>
            </a>
            <a class="text-decoration-none" href="{{ route('admin.slideshow.moveupdown', ['id' => $slideshow['ssid'], 'action' => '0', 'page' => $slideshows->currentPage()]) }}" onclick="moveUpDown(event, this)">
                <i class="align-middle" data-feather="arrow-down"></i>
            </a>

            <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#deleteModal{{ $slideshow['ssid'] }}">
                <i class="align-middle" data-feather="trash"></i>
            </a>                            

            <a class="text-decoration-none"
                href="{{ route('admin.slideshow.edit', ['id' => $slideshow['ssid']]) }}">
                <i class="align-middle" data-feather="edit"></i>
            </a>
        </td>
    </tr>
    
@endforeach

