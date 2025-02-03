export class PaginationMetaData {
    constructor(metaData) {
        this.current_page = metaData.current_page || 0;
        this.from = metaData.from || 0;
        this.last_page = metaData.last_page || 0;
        this.per_page = metaData.per_page || 0;
        this.to = metaData.to || 0;
        this.total = metaData.total || 0;
    }
}