@extends('user.layout.common')

@section('user.index')
    <div class="bl_mv">
        <div class="ly_cont_inner">
            <h2 class="bl_mv_ttl"><img src="images/mv_ttl.png" alt="WEBで活躍できる人になる"></h2>
        </div>
        <!-- /.ly_cont_inner -->
    </div>
    <!-- /.bl_mv -->
    <div class="ly_cont">
        <div class="ly_cont_inner ly_cont__col ly_archive">
            <!-- main -->
            <main class="ly_cont_main bl_archive">
                <p class="el_hitNum"><span class="txt_lg txt_bold">新宿区</span>&nbsp;で検索した結果：20件中&nbsp;1～10件を表示</p>
                @if (isset($job_offers))
                <ul class="bl_archive_list">
                    @foreach ($job_offers as $job_offer)
                    <li class="bl_archive_item">
                        <div class="bl_archive_inner">
                            <!-- /.bl_archive_inner -->
                            <h3 class="bl_archive_ttl">
                                <span class="company_name">{{ $job_offer->company->name }}</span>
                                <a href="" class="word">{{ $job_offer->title }}</a>
                            </h3>
                            <div class="bl_media">
                                <figure class="bl_media_imgWrapper">
                                    <img src="{{ asset('storage/' . $job_offer->image[0]->file_name) }}" alt="" class="w-52">
                                </figure>
                                <div class="bl_media_body">
                                    <dl class="bl_archive_def">
                                        <div>
                                            <dt class="bl_archive_dttl">勤務地</dt>
                                            <dd class="bl_archive_ddata">{{ $job_offer->job_area->area_name }}</dd>
                                        </div>
                                        <div>
                                            <dt class="bl_archive_dttl">勤務時間</dt>
                                            <dd class="bl_archive_ddata">{{ $job_offer->job_time }}</dd>
                                        </div>
                                        <div>
                                            <dt class="bl_archive_dttl">雇用形態</dt>
                                            <dd class="bl_archive_ddata">{{ $job_offer->employment_status }}</dd>
                                        </div>
                                        <div>
                                            <dt class="bl_archive_dttl">給与</dt>
                                            <dd class="bl_archive_ddata">{{ $job_offer->salary }}</dd>
                                        </div>
                                    </dl>
                                    <!-- /.bl_archive_def -->
                                </div>
                                <!-- /.bl_media_body -->
                            </div>
                            <!-- /.bl_media -->
                        </div>
                        <!-- /.bl_archive_inner -->
                        <div class="bl_archive_bottom">
                            <p class="bl_archive_endDate"><span class="label">掲載終了</span><i class="fa-regular fa-clock"></i>2022/10/08</p>
                            <ul class="bl_archive_btnList">
                                <li class="bl_archive_btnItem"><a href="" class="favorite"><i class="fa-regular fa-heart"></i>お気に入りに追加</a></li>
                                <li class="bl_archive_btnItem"><a href="" class="more">詳細を見る</a></li>
                            </ul>
                            <!-- /.bl_archive_btnList -->
                        </div>
                        <!-- /.bl_archive_bottom -->
                    </li>
                    <!-- /.bl_archive_item -->
                    @endforeach
                </ul>
                <!-- /.bl_archive_list -->
                @endif
            </main>
            <!-- aside -->
            <aside class="ly_aside">
                <div class="ly_aside_inner bl_aside">
                    <ul class="bl_searchArea">
                        <li class="bl_searchArea_item" data-id="area">
                            <span class="text">エリアで検索</span>
                            <span class="tagWrapper">
                                <span class="tag">
                                    <i class="fa-solid fa-tag"></i>新宿区
                                </span>
                            </span>
                        </li>
                        <li class="bl_searchArea_item" data-id="jobCategory">
                            <span class="text">職種で検索</span>
                        </li>
                        <li class="bl_searchArea_item" data-id="employment_status">
                            <span class="text">雇用形態で検索</span>
                            <span class="tagWrapper">
                                <span class="tag">
                                    <i class="fa-solid fa-tag"></i>新宿区
                                </span>
                            </span>
                        </li>
                        <li class="bl_searchArea_item">
                            <a href="#">
                                <span class="text">条件を絞り込む</span>
                                <span class="tagWrapper">
                                    <span class="tag">
                                        <i class="fa-solid fa-tag"></i>新宿区
                                    </span>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!-- /.bl_searchArea -->
                    <!-- モーダル中身 -->
                    <div class="bl_overlay"></div>
                    <div class="bl_modal" data-id="modal_area">
                        <div class="bl_modal_body">
                            <button type="button" class="bl_modal_close">
                                <span class="bl_modal_close_inner">
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                            <h3 class="bl_modal_ttl">エリアで検索</h3>
                            <ul class="bl_modal_list">
                                @foreach ($job_areas as $job_area)
                                <li class="bl_modal_item">{{ $job_area->job_area->area_name }}</li>
                                @endforeach
                            </ul>
                            <!-- /.bl_modal_list -->
                        </div>
                        <!-- /.bl_modal_body -->
                    </div>
                    <!-- /.bl_modal -->
                    <div class="bl_modal" data-id="modal_jobCategory">
                        <div class="bl_modal_body">
                            <button type="button" class="bl_modal_close">
                                <span class="bl_modal_close_inner">
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                            <h3 class="bl_modal_ttl">職種で検索</h3>
                            <ul class="bl_modal_list">
                                @foreach ($job_categories as $job_category)
                                <li class="bl_modal_item">{{ $job_category->job_category->category_name }}</li>
                                @endforeach
                            </ul>
                            <!-- /.bl_modal_list -->
                        </div>
                        <!-- /.bl_modal_body -->
                    </div>
                    <!-- /.bl_modal -->
                    <div class="bl_modal" data-id="modal_employment_status">
                        <div class="bl_modal_body">
                            <button type="button" class="bl_modal_close">
                                <span class="bl_modal_close_inner">
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                            <h3 class="bl_modal_ttl">雇用形態で検索</h3>
                            <ul class="bl_modal_list">
                                @foreach ($employment_status as $value)
                                <li class="bl_modal_item">{{ $value->employment_status }}</li>
                                @endforeach
                            </ul>
                            <!-- /.bl_modal_list -->
                        </div>
                        <!-- /.bl_modal_body -->
                    </div>
                    <!-- /.bl_modal -->
                    <div class="bl_keywordSearch">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" name="" placeholder="キーワードで検索">
                    </div>
                    <!-- /.bl_keywordSearch -->
                </div>
                <!-- /.ly_aside_inner -->
            </aside>
        </div>
        <!-- /.ly_cont_inner .ly_cont__col -->
    </div>
    <!-- /.ly_cont -->
@endsection
