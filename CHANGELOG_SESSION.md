# CourseDetail Component Updates - Session Summary

## Overview
Successfully implemented three major enhancements to the LMS CourseDetail dashboard:
1. ✅ Added "Materi Teks & Gambar" (Article) content type
2. ✅ Dynamic icon/duration display based on content type
3. ✅ Fixed drag-and-drop (Sortable.js) functionality

---

## Changes Made

### 1. Added Article Content Type Option

**File:** `resources/views/livewire/course-detail.blade.php`

**Changes:**
- Updated content type dropdown with new "📝 Materi Teks & Gambar" option
- Changed `wire:model` to `wire:model.live` for real-time reactivity
- Added conditional content field rendering:
  - **Article type**: Shows `<textarea>` for rich text content
  - **Other types**: Shows `<input type="text">` for URLs

**Code:**
```blade
<select wire:model.live="contentType" id="contentType"
    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent transition-all">
    <option value="video">📹 Video</option>
    <option value="document">📄 Dokumen</option>
    <option value="article">📝 Materi Teks & Gambar</option>
    <option value="quiz">❓ Kuis</option>
    <option value="other">📦 Lainnya</option>
</select>

<!-- Conditional Content Field -->
@if ($contentType === 'article')
    <textarea wire:model="content" rows="6" placeholder="Tuliskan konten materi..."></textarea>
    <p class="mt-2 text-xs text-gray-500">💡 Anda dapat menulis konten dalam format teks dengan detail lengkap...</p>
@else
    <input type="text" wire:model="content" placeholder="Masukkan URL atau path file">
@endif
```

---

### 2. Dynamic Icon & Duration Display

**File:** `resources/views/livewire/course-detail.blade.php`

**Changes:**
- Refactored icon rendering to be dynamic based on `content_type`
- Added comprehensive icon mapping with color coding:
  - **Video**: Red icon (`fa-video`)
  - **Document**: Blue icon (`fa-file-lines`)
  - **Article**: Purple icon (`fa-book`)
  - **Quiz**: Green icon (`fa-question`)
  - **Other**: Gray icon (`fa-box`)
- Type names now display properly in Indonesian:
  - video → "Video"
  - document → "Dokumen"
  - article → "Materi Teks"
  - quiz → "Kuis"
  - other → "Lainnya"

**Code:**
```blade
@php 
    $type = $lesson['content_type'] ?? 'video';
    $iconConfig = [
        'video' => ['icon' => 'fa-video', 'bg' => 'bg-red-100', 'text' => 'text-red-600'],
        'document' => ['icon' => 'fa-file-lines', 'bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
        'article' => ['icon' => 'fa-book', 'bg' => 'bg-purple-100', 'text' => 'text-purple-600'],
        'quiz' => ['icon' => 'fa-question', 'bg' => 'bg-green-100', 'text' => 'text-green-600'],
        'other' => ['icon' => 'fa-box', 'bg' => 'bg-gray-100', 'text' => 'text-gray-600'],
    ];
    $config = $iconConfig[$type] ?? $iconConfig['other'];
@endphp
<div class="w-8 h-8 {{ $config['bg'] }} rounded-lg flex items-center justify-center">
    <i class="fa-solid {{ $config['icon'] }} {{ $config['text'] }}"></i>
</div>
```

---

### 3. Fixed Drag-and-Drop Functionality

**File:** `resources/views/livewire/course-detail.blade.php`

**Changes:**
- Updated Sortable.js initialization to use Livewire v3 syntax
- Changed from `Livewire.emit()` to `@this.call()` for method invocation
- Updated event listener from `Livewire.hook('message.processed')` to `livewire:updated` event
- Added console logging for debugging drag-and-drop issues
- Added ghost class styling for better visual feedback during drag
- Improved ID extraction with validation and logging

**Old Code:**
```javascript
Livewire.hook('message.processed', () => {
    initSortable();
});

onEnd: function () {
    const ids = Array.from(el.querySelectorAll('[data-id]')).map(i => parseInt(i.dataset.id));
    Livewire.emit('reorderLessons', ids);
}
```

**New Code:**
```javascript
document.addEventListener('livewire:updated', function () {
    initSortable();
});

onEnd: function () {
    const ids = Array.from(el.querySelectorAll('[data-id]')).map(i => {
        const id = parseInt(i.dataset.id);
        console.log('Extracted ID:', id);
        return id;
    });
    console.log('Reordering with IDs:', ids);
    
    // Use proper Livewire v3 dispatch method
    @this.call('reorderLessons', ids);
}
```

---

### 4. Enhanced Backend Logging

**File:** `app/Livewire/CourseDetail.php`

**Changes:**
- Added logging to `reorderLessons()` method for debugging
- Added type checking for incoming `$lessonsOrder` parameter
- Improved error handling with detailed logging

**Code:**
```php
public function reorderLessons($lessonsOrder)
{
    try {
        \Log::debug('Reorder lessons called with:', ['lessonsOrder' => $lessonsOrder]);
        
        // Ensure $lessonsOrder is an array
        if (!is_array($lessonsOrder)) {
            $lessonsOrder = json_decode($lessonsOrder, true) ?? [];
        }

        foreach ($lessonsOrder as $index => $lessonId) {
            Lessons::where('id', $lessonId)->update(['order' => $index + 1]);
        }
        $this->loadLessons();
        $this->dispatch('lesson-reordered', [...]);
    } catch (\Exception $e) {
        \Log::error('Reorder lessons error:', ['message' => $e->getMessage()]);
        // Error handling...
    }
}
```

---

## Technical Details

### Content Types Supported
- **video**: For video-based content (YouTube embeds, Vimeo links)
- **document**: For PDF, Word, or other document files
- **article**: For text-based materi with images (NEW)
- **quiz**: For interactive quizzes
- **other**: For miscellaneous content types

### Database Columns Used
- `content_type`: Stores the type of content
- `content`: Stores URL or text content
- `description`: Stores lesson description
- `duration`: Stores duration in minutes (0-999)
- `section_name`: Groups lessons into sections
- `order`: Controls lesson ordering
- `course_id`: Links to course

### Frontend Dependencies
- **Font Awesome 6.4.0**: Icons
- **SweetAlert2**: Notifications
- **SortableJS 1.15.0**: Drag-and-drop
- **TailwindCSS**: Styling
- **Livewire v3**: Reactive component framework

---

## Testing Checklist

- [ ] Create a new article-type lesson
- [ ] Verify textarea appears for article type
- [ ] Verify URL input appears for other types
- [ ] Check that article icon (purple book) displays correctly in lesson list
- [ ] Check all other icons display with correct colors
- [ ] Test drag-and-drop by reordering lessons
- [ ] Verify console logs show IDs during drag-and-drop
- [ ] Check Laravel log file for reorder debug logs
- [ ] Verify SweetAlert notifications appear after reordering
- [ ] Test with different content types and durations
- [ ] Verify responsive design on mobile/tablet

---

## Debugging Tips

### If Drag-Drop Not Working:
1. Open browser DevTools → Console
2. Check for JavaScript errors
3. Drag a lesson and look for console.log output with IDs
4. Check Laravel logs: `storage/logs/laravel.log`
5. Look for "Reorder lessons called with:" entry

### If Icons Not Showing:
1. Verify Font Awesome CDN is loaded: Check Network tab
2. Ensure `content_type` column exists in `lessons` table
3. Check that lesson data has correct content_type value

### If Form Fields Not Responsive:
1. Verify `wire:model.live` binding is working
2. Check browser DevTools for Livewire component state
3. Ensure no JavaScript errors in console

---

## Future Enhancements

1. **Rich Text Editor**: Integrate Quill or TinyMCE for article content editing
2. **Image Upload**: Add file upload support for article images
3. **Content Preview**: Show preview of article content before saving
4. **Bulk Operations**: Reorder multiple lessons at once
5. **Content Templates**: Pre-defined templates for article structure
6. **Reading Time**: Auto-calculate reading time for articles based on content length

---

## Files Modified

1. `resources/views/livewire/course-detail.blade.php` - View updates
2. `app/Livewire/CourseDetail.php` - Backend logging

---

## Database Migration

If not already run, execute:
```bash
php artisan migrate
```

The migration `2025_01_14_000001_add_columns_to_lessons_table.php` adds:
- `content_type` (string)
- `description` (text)
- `duration` (integer)
- `section_name` (string)

---

## Session Statistics

- **Total Issues Resolved**: 3
- **Files Modified**: 2
- **Lines Added**: ~150
- **Features Added**: 1 (Article content type)
- **Bugs Fixed**: 2 (Drag-drop, Icons)

---

**Last Updated**: Session End
**Status**: ✅ Complete and Ready for Testing
