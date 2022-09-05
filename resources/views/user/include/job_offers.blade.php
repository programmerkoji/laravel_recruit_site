<!-- main -->
<main class="ly_cont_main bl_archive">
    <div class="bl_archive_head">
        @if (!$job_offers->total() == 0)
        <p class="el_hitNum">
            <span><span class="txt_lg txt_bold">{{ $job_offers->total() }}件</span>&nbsp;がヒット！</span>
            <span>{{ $job_offers->firstItem() }}〜{{ $job_offers->lastItem() }}件を表示</span>
        </p>
        @else
        <p>求人は見つかりませんでした…</p>
        <a href="{{ route('user.index') }}" class="back">求人を探す</a>
        @endif
    </div>

    @if (isset($job_offers))
    <ul class="bl_archive_list">
        @foreach ($job_offers as $job_offer)
            <li class="bl_archive_item">
                <div class="bl_archive_inner">
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
                        @if (auth('users')->user())
                        <li class="bl_archive_btnItem">
                            @if (!Auth::user()->is_bookmark($job_offer->id))
                            <form action="{{ route('user.bookmark.store', $job_offer) }}" method="post">
                                @csrf
                                <button type="submit" class="bl_archive_btn favorite">お気に入りに追加</button>
                            </form>
                            @else
                            <form action="{{ route('user.bookmark.destroy', $job_offer) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bl_archive_btn favorite remove">お気に入りを解除</button>
                            </form>
                            @endif
                        </li>
                        @else
                        <li class="bl_archive_btnItem">
                            <a href="{{ route('user.login') }}" class="bl_archive_btn favorite">お気に入りに追加</a>
                        </li>
                        @endif
                        <li class="bl_archive_btnItem"><a href="{{ route('user.show', ['job_offer' => $job_offer->id]) }}" class="bl_archive_btn more">詳細を見る</a></li>
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
    {{ $job_offers->links('vendor.pagination.user_pagination') }}
</main>
<!-- aside -->
<aside class="ly_aside">
    <div class="ly_aside_inner bl_aside">
        <form action="{{ route('user.index') }}" method="get" class="bl_search">
            <ul class="bl_search_inner">
                <li class="bl_search_item">
                    <p class="text accordion_toggle">エリアで検索</p>
                    @if (!$areaDatas->isEmpty())
                    <ul class="el_searchTag">
                        @foreach ($areaDatas as $areaData)
                            <li><i class="fa-solid fa-tag"></i>{{ $areaData->area_name }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <ul class="bl_checkbox">
                        @foreach ($job_areas as $job_area)
                        <li class="bl_checkbox_item">
                            <label>
                                <input type="checkbox" name="area[]" value="{{ $job_area->job_area->id }}" class="bl_checkbox_input">
                                <span>{{ $job_area->job_area->area_name }}</span>
                            </label>
                        </li>
                        @endforeach
                    </ul    >
                    <!-- /.bl_checkbox -->
                </li>
                <li class="bl_search_item job_categories">
                    <p class="text accordion_toggle">職種で検索</p>
                    @if (!$categoryDatas->isEmpty())
                    <ul class="el_searchTag">
                        @foreach ($categoryDatas as $categoryData)
                            <li><i class="fa-solid fa-tag"></i>{{ $categoryData->category_name }}</li>
                        @endforeach
                    </ul>
                    @endif
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
                        {{-- <input type="search" name="keyword" value="@if(isset($keyword)){{ $keyword }}@endif" placeholder="キーワードで検索"> --}}
                        <input type="search" name="keyword" value="{{ Request::get('keyword') }}" placeholder="キーワードで検索">
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
