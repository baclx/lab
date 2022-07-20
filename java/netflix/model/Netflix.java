package model;

public class Netflix {
	private Long id;
	private String title;
	private String category;
	private String actor;
	private String language;
	private int publishingYear;
	private String publishingCompany;
	private int time;
	
	public Netflix(Long id, String title, String category, String actor, String language, int publishingYear,
			String publishingCompany, int time) {
		super();
		this.id = id;
		this.title = title;
		this.category = category;
		this.actor = actor;
		this.language = language;
		this.publishingYear = publishingYear;
		this.publishingCompany = publishingCompany;
		this.time = time;
	}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getCategory() {
		return category;
	}

	public void setCategory(String category) {
		this.category = category;
	}

	public String getActor() {
		return actor;
	}

	public void setActor(String actor) {
		this.actor = actor;
	}

	public String getLanguage() {
		return language;
	}

	public void setLanguage(String language) {
		this.language = language;
	}

	public int getPublishingYear() {
		return publishingYear;
	}

	public void setPublishingYear(int publishingYear) {
		this.publishingYear = publishingYear;
	}

	public String getPublishingCompany() {
		return publishingCompany;
	}

	public void setPublishingCompany(String publishingCompany) {
		this.publishingCompany = publishingCompany;
	}

	public int getTime() {
		return time;
	}

	public void setTime(int time) {
		this.time = time;
	}

	// <=> print
	@Override
	public String toString() {
		return "Netflix [id=" + id + ", title=" + title + ", category=" + category + ", actor=" + actor + ", language="
				+ language + ", publishingYear=" + publishingYear + ", publishingCompany=" + publishingCompany
				+ ", time=" + time + "]";
	}
	
	
}
