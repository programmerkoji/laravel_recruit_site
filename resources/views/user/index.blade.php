@extends('user.layout.common')

@section('content')
    <div>
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
                                        <a href="{{ route('user.show', ['job_offer' => $job_offer->id]) }}" class="word">{{ $job_offer->title }}</a>
                                    </h3>
                                    <div class="bl_media">
                                        @if (isset($job_offer->image[0]))
                                        <figure class="bl_media_imgWrapper">
                                            <img src="{{ asset('storage/' . $job_offer->image[0]->file_name) }}" alt="" class="w-52">
                                        </figure>
                                        @endif
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
                                    <p class="bl_archive_endDate"><span class="label">掲載終了</span><i class="fa-regular fa-clock"></i>{{ $job_offer->posting_end->format('Y/m/d') }}</p>
                                    <ul class="bl_archive_btnList">
                                        <li class="bl_archive_btnItem"><a href="" class="favorite">お気に入りに追加</a></li>
                                        <li class="bl_archive_btnItem"><a href="{{ route('user.show', ['job_offer' => $job_offer->id]) }}" class="more">詳細を見る</a></li>
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
                        <form action="{{ route('user.index') }}" method="get" class="bl_sort">
                            <select name="sort" id="sort">
                                <option value="1" @if(\Request::get('sort') === '1') selected @endif>新着順</option>
                                <option value="2" @if(\Request::get('sort') === '2') selected @endif>古い順</option>
                            </select>
                            <button type="submit">並び替える</button>
                        </form>
                        <!-- /.bl_sort -->
                        <form action="{{ route('user.index') }}" method="get" class="bl_search">
                            <ul class="bl_search_inner">
                                <li class="bl_search_item">
                                    <p class="text">エリアで検索</p>
                                    <ul class="bl_checkbox">
                                        @foreach ($job_areas as $job_area)
                                        <li class="bl_checkbox_item">
                                            <label>
                                                <input type="checkbox" name="area[]" value="{{ $job_area->job_area->id }}" class="bl_checkbox_input">
                                                <span>{{ $job_area->job_area->area_name }}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- /.bl_checkbox -->
                                </li>
                                <li class="bl_search_item job_categories">
                                    <p class="text">職種で検索</p>
                                    <ul class="bl_checkbox">
                                        @foreach ($job_categories as $job_category)
                                        <li class="bl_checkbox_item">
                                            <label>
                                                <input type="checkbox" name="category[]" class="bl_checkbox_input" value="{{ $job_category->job_category->id }}">
                                                <span>{{ $job_category->job_category->category_name }}</span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- /.bl_checkbox -->
                                </li>
                                <li class="bl_search_item">
                                    <div class="bl_keywordSearch">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                        <input type="search" name="keyword" value="@if(isset($keyword)){{ $keyword }}@endif" placeholder="キーワードで検索">
                                    </div>
                                    <!-- /.bl_keywordSearch -->
                                </li>
                            </ul>
                            <!-- /.bl_search_inner -->
                            <button type="submit" class="bl_search_btn">検索する</button>
                        </form>
                    </div>
                    <!-- /.ly_aside_inner -->
                </aside>
            </div>
            <!-- /.ly_cont_inner .ly_cont__col -->
        </div>
        <!-- /.ly_cont -->
    </div>
@endsection
