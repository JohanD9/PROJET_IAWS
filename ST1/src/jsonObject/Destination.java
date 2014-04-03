package jsonObject;

public class Destination
{
	private String name;
	private String cityName;
	
	public String getName()
	{
		return name;
	}
	
	public void setName(String name)
	{
		this.name = name;
	}
	
	public String getCityName()
	{
		return cityName;
	}
	
	public void setCityName(String cityName)
	{
		this.cityName = cityName;
	}
	
	public String toString()
	{
		return ("destination :\n\t\tname : "+name+"\n\t\tcityName : "+cityName+"\n");
	}
}
