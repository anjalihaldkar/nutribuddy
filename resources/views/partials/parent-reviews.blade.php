@php
    $hasDynamicProductReviews = isset($product) && $product->reviews->where('is_active', true)->isNotEmpty();
    $gradients = [
        'linear-gradient(160deg,#FF8FAB,#FF4D8F)',
        'linear-gradient(160deg,#7BC8FF,#0099DD)',
        'linear-gradient(160deg,#B79FFF,#7C3AED)',
        'linear-gradient(160deg,#FFD97D,#FF9900)',
        'linear-gradient(160deg,#6EF0C0,#00A87A)',
        'linear-gradient(160deg,#FFB3C6,#FF6B8A)',
    ];

    if ($hasDynamicProductReviews) {
        $allActiveReviews = $product->reviews->where('is_active', true);
        $videoReviews = $allActiveReviews->whereNotNull('video_path')->values();
        $textReviews = $allActiveReviews->whereNull('video_path')->values();
    } else {
        $videoReviews = collect();
        $textReviews = collect();
    }
@endphp
<style>
.wreviews-viewport {
    overflow: hidden;
    width: 100%;
    padding: 10px 0;
}
.wreviews-track {
    display: flex;
    gap: 22px;
    transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
    width: 100%;
}
.wreviews-track .wrev {
    flex: 0 0 calc((100% - 44px) / 3);
    margin-top: 0 !important;
}
@media (max-width: 991px) {
    .wreviews-track .wrev {
        flex: 0 0 calc((100% - 22px) / 2);
    }
}
@media (max-width: 576px) {
    .wreviews-track .wrev {
        flex: 0 0 100%;
    }
}
.wreviews-dots .wdot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #e2e8f0;
    border: none;
    cursor: pointer;
    transition: all 0.3s;
    padding: 0;
}
.wreviews-dots .wdot.active {
    background: var(--pk);
    transform: scale(1.2);
}
</style>
    <!-- ══════════════════════════════════════════
                   TESTIMONIALS
              ══════════════════════════════════════════ -->
              <section class="testi-section-new reveal ">
    <section class="testi-section reveal" id="reviews">
        <span class="sec-eye">Parent Reviews</span>
        <h2 class="sec-title" style="text-align:center">10,000+ Happy Families </h2>

        <div class="rev-summary reveal">
            <div class="rev-big">
                <div class="rev-big-n">4.9</div>
                <div class="rev-big-stars">★★★★★</div>
                <div class="rev-big-l">Based on 6,031 reviews</div>
            </div>
            <div class="rev-bars">
                <div class="rbar-row">5 ★ <div class="rbar-track">
                        <div class="rbar-fill" style="width:88%"></div>
                    </div> 88%</div>
                <div class="rbar-row">4 ★ <div class="rbar-track">
                        <div class="rbar-fill" style="width:8%"></div>
                    </div> 8%</div>
                <div class="rbar-row">3 ★ <div class="rbar-track">
                        <div class="rbar-fill" style="width:2.5%"></div>
                    </div> 2.5%</div>
                <div class="rbar-row">2 ★ <div class="rbar-track">
                        <div class="rbar-fill" style="width:1%"></div>
                    </div> 1%</div>
                <div class="rbar-row">1 ★ <div class="rbar-track">
                        <div class="rbar-fill" style="width:.5%"></div>
                    </div> 0.5%</div>
            </div>
            <div style="display:flex;flex-direction:column;gap:10px;min-width:180px">
                <div
                    style="text-align:center;font-family:'Fredoka One',cursive;font-size:1rem;color:var(--dk);margin-bottom:4px">
                    Top Tags</div>
                <div style="display:flex;flex-wrap:wrap;gap:8px">
                    <span
                        style="background:var(--pkl);color:var(--pk);border-radius:50px;padding:5px 12px;font-family:'Nunito',sans-serif;font-weight:800;font-size:.75rem">Tastes
                        Great</span>
                    <span
                        style="background:var(--skl);color:#0088bb;border-radius:50px;padding:5px 12px;font-family:'Nunito',sans-serif;font-weight:800;font-size:.75rem">Really
                        Works</span>
                    <span
                        style="background:var(--mnl);color:var(--mn);border-radius:50px;padding:5px 12px;font-family:'Nunito',sans-serif;font-weight:800;font-size:.75rem">Fast
                        Results</span>
                                 </div>
            </div>
        </div>
</section>
        <div class="reels-section-wrap">

            <!-- Header row with title + nav buttons -->
            <div class="reels-header">
                <p class="reels-title">Parent Video Reviews</p>
                <div class="reels-nav">
                    <button class="reels-btn" id="reelPrev" aria-label="Previous">‹</button>
                    <button class="reels-btn reels-btn-next" id="reelNext" aria-label="Next">›</button>
                </div>
            </div>

            <!-- Viewport clips the track -->
            <div class="reels-viewport" id="reelsViewport">
                <div class="reels-row" id="reelsRow">

                    @if($videoReviews->isNotEmpty())
                        @foreach($videoReviews as $index => $review)
                            @php
                                $grad = $gradients[$index % count($gradients)];
                            @endphp
                            <div class="reel" data-reel="{{ $index }}" style="background:{{ $grad }}">
                                <div class="reel-prog">
                                    <div class="reel-bar" id="rb{{ $index }}"></div>
                                </div>
                                <div class="reel-bg">
                                    <video muted loop playsinline preload="auto">
                                        <source src="{{ asset('storage/' . $review->video_path) }}" type="video/mp4">
                                    </video>
                                </div>
                                <div class="reel-ov"></div>
                                <div class="reel-play-btn" id="rp{{ $index }}">▶</div>
                                <div class="reel-info">
                                    <div class="reel-stars">
                                        @for($i = 0; $i < 5; $i++)
                                            {{ $i < $review->rating ? '★' : '☆' }}
                                        @endfor
                                    </div>
                                    <div class="reel-ava">👱‍♀️</div>
                                    <div class="reel-name">{{ $review->user?->name ?? 'Anonymous Parent' }}</div>
                                    <div class="reel-txt">"{{ $review->comment }}"</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Hardcoded Reels -->
                        <div class="reel" data-reel="0" style="background:linear-gradient(160deg,#FF8FAB,#FF4D8F)">
                            <div class="reel-prog"><div class="reel-bar" id="rb0"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp0">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Priya Sharma</div>
                                <div class="reel-txt">"My daughter hasn't missed school since starting GrowStrong!"</div>
                            </div>
                        </div>

                        <div class="reel" data-reel="1" style="background:linear-gradient(160deg,#7BC8FF,#0099DD)">
                            <div class="reel-prog"><div class="reel-bar" id="rb1"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp1">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Rahul Mehta</div>
                                <div class="reel-txt">"BrainBoost changed exam season for us. His focus is insane."</div>
                            </div>
                        </div>

                        <div class="reel" data-reel="2" style="background:linear-gradient(160deg,#B79FFF,#7C3AED)">
                            <div class="reel-prog"><div class="reel-bar" id="rb2"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp2">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Dr. Anita Nair</div>
                                <div class="reel-txt">"As a pediatrician, I recommend NutriBuddy with full confidence."</div>
                            </div>
                        </div>

                        <div class="reel" data-reel="3" style="background:linear-gradient(160deg,#FFD97D,#FF9900)">
                            <div class="reel-prog"><div class="reel-bar" id="rb3"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp3">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Fatima Khan</div>
                                <div class="reel-txt">"DreamCalm turned bedtime from nightmare into our fav time."</div>
                            </div>
                        </div>

                        <div class="reel" data-reel="4" style="background:linear-gradient(160deg,#6EF0C0,#00A87A)">
                            <div class="reel-prog"><div class="reel-bar" id="rb4"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp4">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Vikram Patel</div>
                                <div class="reel-txt">"Both kids on different NutriBuddy plans. Life-changing."</div>
                            </div>
                        </div>

                        <div class="reel" data-reel="5" style="background:linear-gradient(160deg,#FFB3C6,#FF6B8A)">
                            <div class="reel-prog"><div class="reel-bar" id="rb5"></div></div>
                            <div class="reel-bg"><video muted loop playsinline preload="auto"><source src="{{ asset('img/v.mp4') }}" type="video/mp4"></video></div>
                            <div class="reel-ov"></div>
                            <div class="reel-play-btn" id="rp5">▶</div>
                            <div class="reel-info">
                                <div class="reel-stars">★★★★★</div>
                                <div class="reel-ava">👱‍♀️</div>
                                <div class="reel-name">Sneha Joshi</div>
                                <div class="reel-txt">"My toddler asks for his gummy before breakfast. That's a win."</div>
                            </div>
                        </div>
                    @endif

                </div><!-- /reels-row -->
            </div><!-- /reels-viewport -->

            <!-- Dot indicators -->
            <div class="reels-dots" id="reelsDots">
                @if($videoReviews->isNotEmpty())
                    @foreach($videoReviews as $index => $review)
                        <button class="reels-dot {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"></button>
                    @endforeach
                @else
                    <button class="reels-dot active" data-index="0"></button>
                    <button class="reels-dot" data-index="1"></button>
                    <button class="reels-dot" data-index="2"></button>
                    <button class="reels-dot" data-index="3"></button>
                    <button class="reels-dot" data-index="4"></button>
                    <button class="reels-dot" data-index="5"></button>
                @endif
            </div>

        </div><!-- /reels-section-wrap -->

        <div class="wreviews-section-wrap" style="position: relative; margin-top: 48px;">
            @if($textReviews->isNotEmpty() && $textReviews->count() > 3)
                <div class="wreviews-header" style="display: flex; justify-content: flex-end; gap: 10px; margin-bottom: 15px;">
                    <button class="reels-btn" id="wrevPrev" aria-label="Previous" style="width: 40px; height: 40px; border-radius: 50%; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; background: #fff; border: 1.5px solid #eee; cursor: pointer; color: var(--dk); transition: all 0.3s;">‹</button>
                    <button class="reels-btn reels-btn-next" id="wrevNext" aria-label="Next" style="width: 40px; height: 40px; border-radius: 50%; font-size: 1.2rem; display: flex; align-items: center; justify-content: center; background: #fff; border: 1.5px solid #eee; cursor: pointer; color: var(--dk); transition: all 0.3s;">›</button>
                </div>
            @endif

            <div class="wreviews-viewport" id="wreviewsViewport">
                <div class="wreviews-track" id="wreviewsTrack">
                    @if($textReviews->isNotEmpty())
                        @foreach($textReviews as $review)
                            <div class="wrev">
                                <div class="wrev-stars">
                                    @for($i = 0; $i < 5; $i++)
                                        {{ $i < $review->rating ? '★' : '☆' }}
                                    @endfor
                                </div>
                                <p class="wrev-txt">{{ $review->comment }}</p>
                                <div class="wrev-author">
                                    <div class="wrev-ava" style="background:{{ $loop->index % 2 == 0 ? '#FFE8F5' : '#E8F5FF' }}"></div>
                                    <div>
                                        <div class="wrev-name">{{ $review->user?->name ?? 'Anonymous Parent' }}</div>
                                        <div class="wrev-meta">Verified Parent</div>
                                        <div class="wrev-badge">✓ Verified Purchase</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Fallback Hardcoded Reviews -->
                        <div class="wrev">
                            <div class="wrev-stars">★★★★★</div>
                            <p class="wrev-txt">My 7-year-old was constantly falling sick. After 2 months of GrowStrong, she hasn't missed a single day of school — and she asks for it every morning!</p>
                            <div class="wrev-author">
                                <div class="wrev-ava" style="background:#FFE8F5"></div>
                                <div>
                                    <div class="wrev-name">Priya Sharma</div>
                                    <div class="wrev-meta">Mum of 2 · Delhi</div>
                                    <div class="wrev-badge">✓ Verified Purchase</div>
                                </div>
                            </div>
                        </div>
                        <div class="wrev">
                            <div class="wrev-stars">★★★★★</div>
                            <p class="wrev-txt">BrainBoost Chews have been a game-changer for exam prep. My son's class teacher actually called to ask what changed — his focus is incredible!</p>
                            <div class="wrev-author">
                                <div class="wrev-ava" style="background:#E8F5FF"></div>
                                <div>
                                    <div class="wrev-name">Rahul Mehta</div>
                                    <div class="wrev-meta">Dad of 1 · Mumbai</div>
                                    <div class="wrev-badge">✓ Verified Purchase</div>
                                </div>
                            </div>
                        </div>
                        <div class="wrev">
                            <div class="wrev-stars">★★★★★</div>
                            <p class="wrev-txt">As a pediatrician, I'm very selective about what I recommend. NutriBuddy's completely transparent formulas and third-party testing give me total confidence.</p>
                            <div class="wrev-author">
                                <div class="wrev-ava" style="background:#EDE9FE"></div>
                                <div>
                                    <div class="wrev-name">Dr. Anita Nair</div>
                                    <div class="wrev-meta">Pediatrician · Bangalore</div>
                                    <div class="wrev-badge">✓ Medical Expert</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            @if($textReviews->isNotEmpty() && $textReviews->count() > 3)
                <div class="wreviews-dots" id="wreviewsDots" style="display: flex; justify-content: center; gap: 8px; margin-top: 20px;">
                    <!-- Dots will be generated dynamically by JS -->
                </div>
            @endif
        </div>
    </section>
