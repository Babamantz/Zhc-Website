<style>
    .board-container {
        width: 100%;
        padding: 0;
        margin: 0;
    }

    /* Chairman Section */
    .chairman-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    .member-card {
        background: white;
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .member-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .chairman-card {
        width: 220px;
    }

    .image-placeholder {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #E8864A 0%, #FFB366 100%);
        border-radius: 8px;
        margin: 0 auto 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 36px;
        box-shadow: 0 3px 10px rgba(232, 134, 74, 0.3);
        position: relative;
        overflow: hidden;
    }

    .image-placeholder::before {
        content: '📷';
        font-size: 36px;
    }

    .image-placeholder::after {
        content: 'Photo';
        position: absolute;
        bottom: 6px;
        font-size: 9px;
        font-weight: 600;
        letter-spacing: 0.8px;
    }

    .director-card .image-placeholder {
        width: 90px;
        height: 100px;
    }

    .director-card .image-placeholder::before {
        font-size: 32px;
    }

    .name-placeholder {
        background: #f0f4f8;
        padding: 8px 12px;
        border-radius: 6px;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2B4C8C;
        font-size: 13px;
        min-height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.3;
    }

    .director-card .name-placeholder {
        font-size: 12px;
        padding: 6px 10px;
        min-height: 30px;
    }

    .position-placeholder {
        background: #fff3e0;
        padding: 6px 10px;
        border-radius: 5px;
        color: #E8864A;
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        min-height: 26px;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: 1.2;
    }

    /* Members Grid - Top row with 5 items centered */
    .members-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 15px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .members-grid .director-card:nth-child(1) {
        grid-column: 2 / 4;
    }

    .members-grid .director-card:nth-child(2) {
        grid-column: 4 / 6;
    }

    .members-grid .director-card:nth-child(3) {
        grid-column: 6 / 8;
    }

    .members-grid .director-card:nth-child(4) {
        grid-column: 8 / 10;
    }

    .members-grid .director-card:nth-child(5) {
        grid-column: 10 / 12;
    }

    /* Bottom row with 6 items - also use 12 column grid */
    .members-grid-sub {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 15px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .members-grid-sub .director-card:nth-child(1) {
        grid-column: 1 / 3;
    }

    .members-grid-sub .director-card:nth-child(2) {
        grid-column: 3 / 5;
    }

    .members-grid-sub .director-card:nth-child(3) {
        grid-column: 5 / 7;
    }

    .members-grid-sub .director-card:nth-child(4) {
        grid-column: 7 / 9;
    }

    .members-grid-sub .director-card:nth-child(5) {
        grid-column: 9 / 11;
    }

    .members-grid-sub .director-card:nth-child(6) {
        grid-column: 11 / 13;
    }

    .member-card.director-card {
        width: 100%;
    }

    /* Role Badge */
    .role-badge {
        display: inline-block;
        background: #2B4C8C;
        color: white;
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 9px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-top: 8px;
    }

    .chairman-badge {
        background: #E8864A;
    }

    /* Image styles */
    .member-card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        margin: 0 auto 12px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .director-card img {
        width: 90px;
        height: 100px;
    }

    /* Responsive */
    @media (max-width: 1024px) {

        .members-grid,
        .members-grid-sub {
            max-width: 100%;
            gap: 12px;
        }
    }

    @media (max-width: 768px) {
        .chairman-card {
            width: 100%;
            max-width: 220px;
        }

        .members-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .members-grid .director-card:nth-child(1),
        .members-grid .director-card:nth-child(2),
        .members-grid .director-card:nth-child(3),
        .members-grid .director-card:nth-child(4),
        .members-grid .director-card:nth-child(5) {
            grid-column: auto;
        }

        .members-grid-sub {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .members-grid-sub .director-card:nth-child(1),
        .members-grid-sub .director-card:nth-child(2),
        .members-grid-sub .director-card:nth-child(3),
        .members-grid-sub .director-card:nth-child(4),
        .members-grid-sub .director-card:nth-child(5),
        .members-grid-sub .director-card:nth-child(6) {
            grid-column: auto;
        }
    }

    @media (max-width: 480px) {
        .members-grid {
            grid-template-columns: 1fr;
        }

        .members-grid-sub {
            grid-template-columns: 1fr;
        }

        .image-placeholder,
        .member-card img {
            width: 85px;
            height: 85px;
        }

        .director-card .image-placeholder,
        .director-card img {
            width: 80px;
            height: 90px;
        }

        .name-placeholder {
            font-size: 12px;
            padding: 7px 10px;
        }

        .director-card .name-placeholder {
            font-size: 11px;
        }

        .position-placeholder {
            font-size: 9px;
        }

        .role-badge {
            font-size: 8px;
            padding: 3px 10px;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .member-card {
        animation: fadeIn 0.5s ease forwards;
        opacity: 0;
    }

    .chairman-card {
        animation-delay: 0.1s;
    }

    .director-card:nth-child(1) {
        animation-delay: 0.15s;
    }

    .director-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .director-card:nth-child(3) {
        animation-delay: 0.25s;
    }

    .director-card:nth-child(4) {
        animation-delay: 0.3s;
    }

    .director-card:nth-child(5) {
        animation-delay: 0.35s;
    }

    .director-card:nth-child(6) {
        animation-delay: 0.4s;
    }
</style>

<div class="flex flex-col">
    <x-page-header title="Management" />

    <div class="mt-5 px-1 min-h-[80vh]">
        <div class="border-b-2 border-black-600 w-full">
            <h2 class="text-2xl font-bold mb-2">Management</h2>
        </div>
        <div class="board-container">
            <!-- Chairman Section -->
            @foreach ($levels['level_one'] as $member)
                <div class="chairman-section mt-3 p-5">
                    <div class="member-card chairman-card">
                        <div>
                            <img class="mx-auto rounded-sm" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                alt="member_image">
                        </div>
                        <div class="name-placeholder">{{ $member['full_name'] }}</div>
                        <span class="role-badge chairman-badge">{{ $member['role'] }}</span>
                    </div>
                </div>
            @endforeach

            <!-- Board Members Grid (Top row - 5 members) -->
            <div class="members-grid py-6">
                @foreach ($levels['level_two'] as $member)
                    <div class="chairman-section mt-3 p-3">
                        <div class="member-card chairman-card">
                            <div>
                                <img class="mx-auto rounded-sm" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                    alt="member_image">
                            </div>
                            <div class="name-placeholder">{{ $member['full_name'] }}</div>
                            <div class="position-placeholder">{{ $member['title'] }}</div>
                            <span class="role-badge">{{ $member['role'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Board Members Grid (Bottom row - 6 members) -->
            <div class="members-grid-sub p-6 mx-auto">
                @foreach ($levels['level_two'] as $member)
                    <div class="chairman-section mt-3 p-3">
                        <div class="member-card chairman-card">
                            <div>
                                <img class="mx-auto rounded-sm" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                    alt="member_image">
                            </div>
                            <div class="name-placeholder">{{ $member['full_name'] }}</div>
                            <div class="position-placeholder">{{ $member['title'] }}</div>
                            <span class="role-badge">{{ $member['role'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
