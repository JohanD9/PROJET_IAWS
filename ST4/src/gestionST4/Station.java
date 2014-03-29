package gestionST4;

public class Station {
	private int number;
	private String name;
	private String address;
	private Position position;
	private Boolean banking;
	private Boolean bonus;
	private String status;
	private String contract_name;
	private int bike_stands;
	private int available_bike_stands;
	private int available_bikes;
	private int last_update;
	

	public int getNumber() {
		return number;
	}

	public void setNumber(int number) {
		this.number = number;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getAddress() {
		return address;
	}

	public void setAddress(String address) {
		this.address = address;
	}

	public Position getPosition() {
		return position;
	}

	public void setPosition(Position position) {
		this.position = position;
	}

	public Boolean getBanking() {
		return banking;
	}

	public void setBanking(Boolean banking) {
		this.banking = banking;
	}

	public Boolean getBonus() {
		return bonus;
	}

	public void setBonus(Boolean bonus) {
		this.bonus = bonus;
	}

	public String getStatus() {
		return status;
	}

	public void setStatus(String status) {
		this.status = status;
	}

	public String getContract_name() {
		return contract_name;
	}

	public void setContract_name(String contract_name) {
		this.contract_name = contract_name;
	}

	public int getBike_stands() {
		return bike_stands;
	}

	public void setBike_stands(int bike_stands) {
		this.bike_stands = bike_stands;
	}

	public int getAvailable_bike_stands() {
		return available_bike_stands;
	}

	public void setAvailable_bike_stands(int available_bike_stands) {
		this.available_bike_stands = available_bike_stands;
	}

	public int getAvailable_bikes() {
		return available_bikes;
	}

	public void setAvailable_bikes(int available_bikes) {
		this.available_bikes = available_bikes;
	}

	public int getLast_update() {
		return last_update;
	}

	public void setLast_update(int last_update) {
		this.last_update = last_update;
	}

	@Override
	public String toString() {
		return name + " : " + 
				"\n		number : " + number + "\n		address : "
				+ address + "\n		position : " + position + "\n		banking : " + banking
				+ "\n		bonus : " + bonus + "\n		status : " + status
				+ "\n		contract_name : " + contract_name + "\n		bike_stands : "
				+ bike_stands + "\n		available_bike_stands : "
				+ available_bike_stands + "\n		available_bikes : "
				+ available_bikes + "\n		last_update : " + last_update + "\n";
	}
	
	
}
