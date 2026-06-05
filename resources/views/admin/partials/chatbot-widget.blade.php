<div class="fixed bottom-6 right-6 z-50 flex flex-col items-end font-[Figtree]">

    <div id="chatWindow" class="hidden w-[calc(100vw-3rem)] sm:w-85 lg:w-96 h-[32rem] mb-5 bg-white/90 backdrop-blur-2xl shadow-[0_20px_50px_rgba(0,0,0,0.12)] rounded-[2rem] border border-slate-200/60 flex-col overflow-hidden transition-all duration-300 transform scale-y-0 opacity-0 origin-bottom-right">

        <div class="bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-950 p-4 text-white flex justify-between items-center border-b border-white/10 relative overflow-hidden">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-blue-500/10 rounded-full blur-xl pointer-events-none"></div>

            <div class="flex items-center gap-3 relative z-10">
                <div class="relative">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center text-white shadow-inner">
                        <i data-lucide="bot" class="w-5 h-5 text-blue-50"></i>
                    </div>
                    <span class="absolute bottom-0 right-0 w-3 h-3 bg-emerald-500 border-2 border-slate-950 rounded-full animate-pulse"></span>
                </div>
                <div>
                    <h4 class="font-bold text-sm tracking-tight text-slate-100">Mori Nalove Assistant</h4>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="text-[9px] text-indigo-300 font-bold tracking-wider uppercase bg-indigo-500/20 px-1.5 py-0.5 rounded-md border border-indigo-500/30">AI Mitigasi</span>
                        <span class="text-[9px] text-emerald-400 font-medium">Online</span>
                    </div>
                </div>
            </div>

            <button onclick="toggleChat()" class="text-slate-400 hover:text-white transition-colors bg-white/5 hover:bg-white/10 p-2 rounded-xl border border-white/5 focus:outline-none">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>

        <div id="chatMessages" class="flex-1 p-5 overflow-y-auto bg-gradient-to-b from-slate-50/60 to-slate-100/40 space-y-4 scroll-smooth hide-scrollbar" style="scrollbar-width: none; -ms-overflow-style: none;">

            <div class="flex gap-3 max-w-[85%] animate-[slideDown_0.3s_ease-out]">
                <div class="w-8 h-8 rounded-xl bg-white border border-slate-200/80 text-blue-600 flex items-center justify-center shrink-0 shadow-sm">
                    <i data-lucide="sparkles" class="w-4 h-4"></i>
                </div>
                <div class="bg-white p-3.5 rounded-2xl rounded-tl-none border border-slate-200/60 shadow-sm text-sm text-slate-700 leading-relaxed font-medium">
                    Halo! Saya AI Mori Nalove. Ada yang bisa saya bantu terkait informasi mitigasi atau evakuasi hari ini?
                </div>
            </div>

        </div>

        <div class="p-4 bg-white border-t border-slate-200/50 backdrop-blur-md">
            <form class="flex items-center gap-2 bg-slate-50 border border-slate-200/80 rounded-2xl p-1.5 focus-within:ring-2 focus-within:ring-blue-500/20 focus-within:border-blue-500 transition-all duration-300" onsubmit="sendChatMessage(event)">
                <input type="text" id="chatInput" class="flex-1 bg-transparent px-3 py-2 text-sm text-slate-700 placeholder-slate-400 outline-none w-full border-none focus:ring-0" placeholder="Ketik pesan mitigasi di sini..." autocomplete="off">

                <button type="submit" id="chatSubmit" class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white w-9 h-9 rounded-xl transition-all shadow-md flex items-center justify-center shrink-0 hover:scale-105 active:scale-95 disabled:opacity-50">
                    <i data-lucide="send-horizontal" class="w-4 h-4"></i>
                </button>
            </form>
            <p class="text-[10px] text-center text-slate-400 mt-2 font-medium">Powered by Llama 3.3 70B & Groq Cloud Engine</p>
        </div>
    </div>

    <button onclick="toggleChat()" class="w-14 h-14 bg-gradient-to-br from-blue-600 via-blue-600 to-indigo-700 rounded-full shadow-[0_10px_30px_rgba(37,99,235,0.3)] flex items-center justify-center text-white hover:scale-105 active:scale-95 transition-all duration-300 border border-white/20 group relative focus:outline-none">
        <div class="absolute inset-0 rounded-full animate-ping bg-blue-500 opacity-25 pointer-events-none"></div>

        <div class="relative w-6 h-6 flex items-center justify-center">
            <i data-lucide="message-square-text" class="w-6 h-6 absolute transition-all duration-300 transform group-hover:scale-0 group-hover:opacity-0"></i>
            <i data-lucide="chevron-up" class="w-6 h-6 absolute transition-all duration-300 transform scale-0 opacity-0 group-hover:scale-100 group-hover:opacity-100"></i>
        </div>
    </button>
</div>