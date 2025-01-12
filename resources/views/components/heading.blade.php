<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<style>
    *,
    *:before,
    *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .heading {
        display: flex;
        width: 100vw;
        height: 60px;
        padding: 0px 20px;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(0, 60, 60, 0.20);
        background: #FFF;
    }

    .heading-img {
        width: 15%;
        height: auto;
        flex-shrink: 0;
    }

    .heading-img img {
        width: 100%;
        height: 100%;
    }

    .heading-dashboard {
        display: flex;
        width: 20%;
        justify-content: space-between;
        align-items: center;
        flex-shrink: 0;
        align-self: stretch;
    }

    .heading-dashboard p {
        color: #000;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .heading-dashboard p:hover {
        cursor: pointer;
    }

    .heading-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .heading-info p {
        color: #000;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .heading-info svg:hover {
        cursor: pointer;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        width: 200px;
        top: 60px;
        right: 20px;
        background-color: white;
        border: 1px solid rgba(0, 60, 60, 0.2);
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        z-index: 1;
    }

    .dropdown-menu a {
        display: flex;
        color: black;
        padding: 10px;
        gap: 20px;
        text-decoration: none;
        font-family: Inter, sans-serif;
        font-size: 14px;
        align-items: center;
    }

    .dropdown-menu a:hover {
        background-color: rgba(0, 60, 60, 0.1);
    }

    form {
        width: 100%;
        padding: 10px;
        font-family: "Inter";
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    form svg {
        margin-right: 20px;
    }

    #logoutForm:hover {
        background-color: rgba(0, 60, 60, 0.1);
        cursor: pointer;
    }
</style>
<div id="header">
    <div class="heading">
        <div class="heading-img">
            <img src="{{ asset('images/banner_uit.png') }}" alt="Banner">
        </div>
        <div class="heading-dashboard">
            <p id="dashboard">Tổng quan</p>
            <p id="classLink">Lớp học</p>
            <p id="calendarDate">Lịch</p>
        </div>
        <div class="heading-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 60 60" fill="none">
                <path
                    d="M52.5 36.9999V17.9999V17.9917C52.5 15.1969 52.5 13.7986 51.9556 12.7301C51.4762 11.7893 50.7103 11.0243 49.7695 10.545C48.6999 10 47.3008 10 44.5005 10H15.5005C12.7002 10 11.2991 10 10.2295 10.545C9.28868 11.0243 8.52433 11.7893 8.04497 12.7301C7.5 13.7997 7.5 15.1996 7.5 17.9999V46.6774C7.5 49.3416 7.5 50.6739 8.04614 51.3581C8.52111 51.9531 9.24109 52.2993 10.0024 52.2985C10.8779 52.2975 11.9186 51.4652 13.999 49.8009L17.8089 46.7529C18.6211 46.1032 19.0271 45.7785 19.4793 45.5475C19.8805 45.3425 20.307 45.1927 20.7483 45.1021C21.2457 45 21.7663 45 22.8064 45H44.5002C47.3004 45 48.6999 44.9999 49.7695 44.455C50.7103 43.9756 51.4762 43.2109 51.9556 42.2701C52.5 41.2016 52.5 39.8029 52.5 37.0081V36.9999Z"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p>{{ session('user.name') }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 60 60" fill="none">
                <path
                    d="M43.0416 48.3307C39.8373 44.752 35.1816 42.5 30 42.5C24.8184 42.5 20.1623 44.752 16.958 48.3307M30 52.5C17.5736 52.5 7.5 42.4264 7.5 30C7.5 17.5736 17.5736 7.5 30 7.5C42.4264 7.5 52.5 17.5736 52.5 30C52.5 42.4264 42.4264 52.5 30 52.5ZM30 35C25.8579 35 22.5 31.6421 22.5 27.5C22.5 23.3579 25.8579 20 30 20C34.1421 20 37.5 23.3579 37.5 27.5C37.5 31.6421 34.1421 35 30 35Z"
                    stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" id="toggleDropdown" width="24" height="24"
                viewBox="0 0 24 24" fill="none">
                <path d="M19 9L12 16L5 9" stroke="black" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <div class="dropdown-menu" id="dropdownMenu">
                <a href="#" id="viewProfile">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M20 21C20 18.2386 16.4183 16 12 16C7.58172 16 4 18.2386 4 21M12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13Z"
                            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Thông tin cá nhân
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <div style="cursor: pointer; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M12 15L15 12M15 12L12 9M15 12L4 12M4 17C4 17.9319 4 18.3978 4.15224 18.7654C4.35523 19.2554 4.74481 19.6448 5.23486 19.8478C5.6024 20 6.06812 20 7 20H16.8C17.9201 20 18.48 20 18.9078 19.782C19.2841 19.5902 19.5905 19.2844 19.7822 18.908C20.0002 18.4802 20 17.9201 20 16.8V7.19995C20 6.07985 20.0002 5.51986 19.7822 5.09204C19.5905 4.71572 19.2841 4.40973 18.9078 4.21799C18.48 4 17.9201 4 16.8 4H7C6.06812 4 5.60241 4 5.23486 4.15224C4.74481 4.35523 4.35523 4.74456 4.15224 5.23462C4 5.60216 4 6.0681 4 6.99999"
                                stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Đăng xuất
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const role = "{{ session('user.role') }}";
    // JavaScript to toggle dropdown visibility
    const toggleDropdown = document.getElementById('toggleDropdown');
    const dropdownMenu = document.getElementById('dropdownMenu');

    toggleDropdown.addEventListener('click', () => {
        // Toggle the dropdown visibility
        dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
    });

    // Close the dropdown if clicking outside
    window.addEventListener('click', function(e) {
        if (!toggleDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.style.display = 'none';
        }
    });

    document.getElementById('classLink').addEventListener('click', function() {
        if (role === 'giaovien') {
            window.location.href = '/teacher/classlist';
        } else if (role === 'sinhvien') {
            window.location.href = '/student/classlist';
        }
    });

    document.getElementById('dashboard').addEventListener('click', function() {
        if (role === 'giaovien') {
            window.location.href = '/teacher/dashboard';
        } else if (role === 'sinhvien') {
            window.location.href = '/student/dashboard';
        }
    });

    document.getElementById('viewProfile').addEventListener('click', function() {
        if (role === 'giaovien') {
            window.location.href = '/teacher/profile';
        } else if (role === 'sinhvien') {
            window.location.href = '/student/profile';
        }
    });

    document.getElementById('calendarDate').addEventListener('click', function() {
        if (role === 'giaovien') {
            window.location.href = '/teacher/calendar';
        } else if (role === 'sinhvien') {
            window.location.href = '/student/calendar';
        }
    });

    document.getElementById('logoutForm').addEventListener('click', function() {
        this.submit(); // Tự động gửi form khi nhấn vào
    });
</script>
