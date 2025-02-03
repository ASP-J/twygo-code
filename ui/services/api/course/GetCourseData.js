export class GetCourseData {
  constructor(data) {
    this.id = data.id || 0;
    this.title = data.title || '';
    this.description = data.description || '';
    this.start_date = data.start_date || '';
    this.end_date = data.end_date || '';
    this.created_at = data.created_at || '';
    this.updated_at = data.updated_at || '';
    this.image_url = data.image_url || '';
    this.videos = data.videos || [];
  }
}