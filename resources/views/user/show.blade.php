@extends('user.layout.common')

@section('title')WEB人「WEB制作専門の求人サイト」@endsection
@section('content')
    <div class="ly_lower">
        <div class="bl_breadCrumbs">
            <div class="ly_cont_inner">
                <ul class="bl_breadCrumbs_list">
                    <li class="bl_breadCrumbs_item"><a href="{{ route('user.index') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="bl_breadCrumbs_item">{{ $jobOfferInfo->title }}</li>
                </ul>
            </div>
            <!-- /.ly_cont_inner -->
        </div>
        <!-- /.bl_breadCrumbs -->
        <div class="ly_cont">
            <div class="ly_cont_inner ly_cont__col">
                <!-- main -->
                <main class="ly_cont_main bl_jobOffer">
                    <div class="bl_jobOffer_inner">
                        <h2 class="bl_jobOffer_ttl">{{ $jobOfferInfo->title }}</h2>
                        @if (!$jobOfferInfo->image->isEmpty())
                            @foreach ($jobOfferInfo->image as $image)
                                <figure class="bl_jobOffer_imgWrapper">
                                    <img src="{{ asset('storage/' . $image->file_name) }}" alt="">
                                </figure>
                            @endforeach
                        @endif

                        <p class="bl_jobOffer_freeTxt">{{ $jobOfferInfo->free_text }}</p>

                        <div class="bl_jobContent">
                            <h3 class="el_secTtl">仕事内容</h3>
                            <p class="bl_jobContent_txt">{{ $jobOfferInfo->job_content }}</p>
                        </div>
                        <!-- /.bl_jobContent -->

                        <div class="bl_detail">
                            <h3 class="el_secTtl">募集要項</h3>
                            <dl class="bl_detail_def">
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">勤務地</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->job_area->area_name }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">職種</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->job_category->category_name }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">雇用形態</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->employment_status }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">給与</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->salary }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">勤務時間</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->job_time }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">休日・休暇</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->holiday }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">待遇・福利厚生</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->welfare }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">応募資格</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->qualification }}</dd>
                                </div>
                                <div class="bl_detail_item">
                                    <dt class="bl_detail_dttl">募集人数</dt>
                                    <dd class="bl_detail_ddata">{{ $jobOfferInfo->recruitment_count }}人</dd>
                                </div>
                            </dl>
                            <!-- /.bl_detail_def -->
                        </div>
                        <!-- /.bl_detail -->
                    </div>
                    <!-- /.bl_jobOffer_inner -->
                </main>
                <!-- aside -->
                <aside class="ly_aside">
                    <ul class="bl_cta">
                        <li class="bl_cta_item">
                            <a href="{{ route('user.entry', ['job_offer' => $jobOfferInfo->id]) }}" class="bl_cta_btn apply">この求人に応募</a>
                        </li>
                        <li class="bl_cta_item">
                            @if (auth('users')->user())
                                @if (!Auth::user()->is_bookmark($jobOfferInfo->id))
                                <form action="{{ route('user.bookmark.store', $jobOfferInfo) }}" method="post">
                                    @csrf
                                    <button type="submit" class="bl_cta_btn favorite"><i class="fa-regular fa-star"></i>お気に入りに追加</button>
                                </form>
                                @else
                                <form action="{{ route('user.bookmark.destroy', $jobOfferInfo) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bl_cta_btn favorite"><i class="fa-regular fa-star"></i>お気に入りを解除</button>
                                </form>
                                @endif
                            @else
                                <a href="{{ route('user.login') }}" class="bl_cta_btn favorite"><i class="fa-regular fa-star"></i>お気に入りに追加</a>
                            @endif
                        </li>
                    </ul>
                    <!-- /.bl_cta -->
                    <div class="bl_companyInfo">
                        <h3 class="bl_companyInfo_ttl">企業情報</h3>
                        <dl class="bl_companyInfo_def">
                            <div>
                                <dt class="bl_companyInfo_dttl">企業名</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->name }}</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">住所</dt>
                                <dd class="bl_companyInfo_ddata">〒{{ $jobOfferInfo->company->post_code }}<br>{{ $jobOfferInfo->company->address }}</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">TEL</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->tel }}</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">代表者名</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->ceo_name }}</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">設立</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->foundation }}</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">資本金</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->capital }}円</dd>
                            </div>
                            <div>
                                <dt class="bl_companyInfo_dttl">従業員数</dt>
                                <dd class="bl_companyInfo_ddata">{{ $jobOfferInfo->company->employee_number }}人</dd>
                            </div>
                        </dl>
                    </div>
                    <!-- /.bl_company -->
                </aside>
            </div>
            <!-- /.ly_cont_inner .ly_cont__col -->
        </div>
        <!-- /.ly_cont -->


    </div>
@endsection
