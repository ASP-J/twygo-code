export class GetVideoData {
    constructor(data) {
        this.id = data.id || 0;
        this.title = data.title || '';
        this.description = data.description || '';
        this.created_at = data.created_at || '';
        this.updated_at = data.updated_at || '';
        this.image_url = data.image_url || '';
        this.video_url = data.video_url || '';
        this.course_id = data.course_id || '';
    }
}