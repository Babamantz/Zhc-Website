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
        margin-bottom: 30px;
    }

    .member-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .member-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .chairman-card {
        width: 320px;
    }

    .image-placeholder {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #E8864A 0%, #FFB366 100%);
        border-radius: 10px;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
        box-shadow: 0 5px 15px rgba(232, 134, 74, 0.3);
        position: relative;
        overflow: hidden;
    }

    .image-placeholder::before {
        content: '📷';
        font-size: 48px;
    }

    .image-placeholder::after {
        content: 'Photo';
        position: absolute;
        bottom: 10px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .director-card .image-placeholder {
        width: 130px;
        height: 150px;
    }

    .director-card .image-placeholder::before {
        font-size: 40px;
    }

    .name-placeholder {
        background: #f0f4f8;
        padding: 12px 20px;
        border-radius: 8px;
        margin-bottom: 10px;
        font-weight: 600;
        color: #2B4C8C;
        font-size: 16px;
        min-height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .director-card .name-placeholder {
        font-size: 15px;
        padding: 10px 15px;
        min-height: 40px;
    }

    .position-placeholder {
        background: #fff3e0;
        padding: 8px 15px;
        border-radius: 6px;
        color: #E8864A;
        font-size: 13px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        min-height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Connector Line */
    .connector {
        width: 2px;
        height: 40px;
        background: linear-gradient(to bottom, #2B4C8C, #E8864A);
        margin: 0 auto 30px;
    }

    /* Members Grid - 3 columns, 2 rows */
    .members-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .member-card.director-card {
        width: 100%;
    }

    /* Role Badge */
    .role-badge {
        display: inline-block;
        background: #2B4C8C;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 10px;
    }

    .chairman-badge {
        background: #E8864A;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .members-grid {
            max-width: 100%;
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .chairman-card {
            width: 100%;
            max-width: 320px;
        }

        .members-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }

    @media (max-width: 480px) {
        .members-grid {
            grid-template-columns: 1fr;
        }

        .image-placeholder {
            width: 120px;
            height: 160px;
        }

        .director-card .image-placeholder {
            width: 110px;
            height: 145px;
        }

        .name-placeholder {
            font-size: 14px;
            padding: 10px 15px;
        }

        .director-card .name-placeholder {
            font-size: 13px;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .member-card {
        animation: fadeIn 0.6s ease forwards;
        opacity: 0;
    }

    .chairman-card {
        animation-delay: 0.1s;
    }

    .director-card:nth-child(1) {
        animation-delay: 0.2s;
    }

    .director-card:nth-child(2) {
        animation-delay: 0.3s;
    }

    .director-card:nth-child(3) {
        animation-delay: 0.4s;
    }

    .director-card:nth-child(4) {
        animation-delay: 0.5s;
    }

    .director-card:nth-child(5) {
        animation-delay: 0.6s;
    }

    .director-card:nth-child(6) {
        animation-delay: 0.7s;
    }
</style>
<div class="flex  flex-col">
    <x-page-header title="Board Members" />






    <div class="mt-5 px-1 min-h-[80vh]">
        <div class="border-b-2 border-black-600 w-full">
            <h2 class="text-2xl font-bold mb-2">Board Members</h2>
        </div>
        <div class="board-container">
            <!-- Chairman Section -->
            @foreach ($levels['level_one'] as $member)
                <div class="chairman-section mt-3 p-5">
                    <div class="member-card chairman-card">
                        <div class="">
                            <img class="mx-auto rounded-sm max-h-30%" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                alt="member_image">
                        </div>
                        <div class="name-placeholder">{{ $member['full_name'] }}</div>
                        <span class="role-badge chairman-badge">{{ $member['role'] }}</span>
                    </div>
                </div>
            @endforeach




            <!-- Board Members Grid (3 columns x 2 rows) -->
            <div class="members-grid py-10">
                @foreach ($levels['level_two'] as $member)
                    <div class="member-card director-card">
                        <div class="">
                            <img class="mx-auto rounded-sm max-h-30%" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                alt="member_image">
                        </div>
                        <div class="name-placeholder">{{ $member['full_name'] }}</div>
                        <span class="role-badge">{{ $member['role'] }}</span>
                    </div>
                @endforeach

                <!-- Row 2 -->
                @foreach ($levels['level_three'] as $member)
                    <div class="member-card director-card">
                        <div class="">
                            <img class="mx-auto rounded-sm max-h-30%" src="{{ $member['images'][0]['thumb'] ?? '' }}"
                                alt="member_image">
                        </div>
                        <div class="name-placeholder">{{ $member['full_name'] }}</div>
                        <span class="role-badge">{{ $member['role'] }}</span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



</div>
</div>
