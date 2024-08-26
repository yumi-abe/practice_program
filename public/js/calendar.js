document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const selectedDateInput = document.getElementById('selectedDate'); // 選択した時間をinputに反映
    const endDateInput = document.getElementById('endDate'); // 選択した時間をinputに反映（自動計算）
    const planCategory = document.getElementById('planCategory');
    const castCategory = document.getElementById('castCategory');
    const calendarView = document.getElementById('calendarView'); // キャストを選択したらカレンダーを表示する用

    let lastEvent = null; // 最後に選択した日時
    let lastEventData = null; // 最後に選択した日時のデータを保存
    let allEvents = []; // 全イベントデータを格納する変数を宣言


    
    const today = new Date();
    // 翌日の日付を取得
    const tomomorrow = new Date(today);
    tomomorrow.setDate(today.getDate() + 1);
    const tomorrowISOString = tomomorrow.toISOString().slice(0, 10); // "YYYY-MM-DD" 形式で日付を取得
    // 30日後の日付を取得
    const futureDate = new Date(tomomorrow);
    futureDate.setDate(tomomorrow.getDate() + 31);
    const futureDateISOString = futureDate.toISOString().slice(0, 10);
    const currentStartDate = document.getElementById('currentStartDate') ? document.getElementById('currentStartDate').value : null;
    const currentEndDate = document.getElementById('currentEndDate') ? document.getElementById('currentEndDate').value : null;


    // 初期表示日付の設定
    const initialDate = currentStartDate || tomorrowISOString;

    // FullCalendar初期化
    const calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'ja',
        slotMinTime: '10:00:00',
        slotMaxTime: '19:00:00',
        initialView: 'timeGridWeek', // 週ごとに表示
        initialDate: initialDate,
        timeZone: 'Asia/Tokyo',
        editable: false,
        selectable: true, // 新規予約時は true に設定
        eventOverlap: false,
        businessHours: true,
        dayMaxEvents: true,
        eventColor: '#76818d', // 全てのイベントの背景色
        eventBorderColor: '#76818d', // 全てのイベントの枠線の色
        displayEventTime: false,
        contentHeight: 'auto',


        
        // 有効な日付範囲を設定
        validRange: {
            start: tomorrowISOString,
            end: futureDateISOString
        },

        // 日付がクリックされたときのイベント
        dateClick: function(info) {
            let date = info.date; // Dateオブジェクトを取得
            let selectedValue = planCategory.value;

            // 選択した日付をYYYY-MM-DD HH:MM形式に変換
            let formattedDateTime = date.toISOString().slice(0, 16).replace('T', ' ');
            selectedDateInput.value = formattedDateTime; // フォームの入力フィールドに日時を設定

            let endDate = new Date(date); // 終了時間の初期値を設定
            // 選択したコースによって加算時間を変える
            if (selectedValue === "1") {
                endDate.setMinutes(endDate.getMinutes() + 30); // 30分加算
            } else if (selectedValue === "2") {
                endDate.setMinutes(endDate.getMinutes() + 60); // 60分加算
            } else if (selectedValue === "3") {
                endDate.setMinutes(endDate.getMinutes() + 180); // 180分加算
            }

            // 最後に選択した日時を保存
            lastEventData = { start: date, end: endDate };

            // 既存の選択した背景を削除
            if (lastEvent) {
                lastEvent.remove();
            }

            // 選択した時間枠を背景色で強調
            lastEvent = calendar.addEvent({
                start: date,
                end: endDate,
                rendering: 'background',
                classNames: ['fc-bg-custom'] // CSSクラスを適用
            });

            // 終了日時をYYYY-MM-DD HH:MM形式に変換
            let formattedEndDateTime = endDate.toISOString().slice(0, 16).replace('T', ' ');
            endDateInput.value = formattedEndDateTime; // 終了日時をフォームの入力フィールドに設定
        },

        // 範囲選択時の処理
        select: function(info) {
            let selectedStartDate = info.start; // 選択した開始日時
            let selectedEndDate = info.end; // 選択した終了日時
            let selectedValue = planCategory.value; // 選択されたコース

            // コースによって加算する時間を設定
            if (selectedValue === "1") {
                selectedEndDate = new Date(selectedEndDate.getTime() + 30 * 60 * 1000); // 30分加算
            } else if (selectedValue === "2") {
                selectedEndDate = new Date(selectedEndDate.getTime() + 60 * 60 * 1000); // 60分加算
            } else if (selectedValue === "3") {
                selectedEndDate = new Date(selectedEndDate.getTime() + 180 * 60 * 1000); // 180分加算
            }

            
        },

        // 週が変更されたときの処理
        datesSet: function() {
            fetchAllEvents(); // 新しいイベントを取得してフィルタリング
        }
    });

    // 全イベントを取得
    function fetchAllEvents() {
        fetch('/reservations/events')
            .then(response => response.json())
            .then(data => {
                allEvents = data; // 全イベントデータを保存
                filterAndRenderEvents(); // イベントをフィルタリングして表示
            })
            .catch(error => console.error('Error fetching events:', error));
    }

    // 選択したキャストのイベントをフィルタリングして表示
    function filterAndRenderEvents() {
        const castId = castCategory.value;
        calendar.removeAllEvents(); // 既存のイベントを削除

        // フィルタリング
        const filteredEvents = allEvents.filter(event => event.cast == castId);

        filteredEvents.forEach(event => {
            calendar.addEvent({
                id: event.id,
                title: event.title,
                start: event.start,
                end: event.end,
                backgroundColor: '#76818d', // 背景色
                borderColor: '#76818d', // 枠線の色
                extendedProps: {
                    cast: event.cast
                }
            });
        });

        // 最後に選択したイベントがあれば再描画
        if (lastEventData) {
            lastEvent = calendar.addEvent({
                start: lastEventData.start,
                end: lastEventData.end,
                rendering: 'background',
                classNames: ['fc-bg-custom']
            });
        }

        // 編集ページからの選択状態を設定 上手くいかない
        if (currentStartDate && currentEndDate) {
            calendar.addEvent({
                start: new Date(currentStartDate),
                end: new Date(currentEndDate),
                rendering: 'background',
                classNames: ['fc-bg-update'],
                editable: true // 編集可能に設定
            });
        }
    }

    // キャストが変更されたときにカレンダーを更新
    castCategory.addEventListener('change', function() {
        calendarView.classList.remove('hidden');
        fetchAllEvents(); // イベントを再取得してフィルタリング
        calendar.render();
    });

    // 初回のイベント取得
    fetchAllEvents();

    calendar.render();
});
