public class ResistorValueCalculator extends Activity{
	private Spinner firstBand, secondBand, multiplier, tolerance;
	private TextView firstBandColor, secondBandColor, multiplierColor,result,
			toleranceColor;
	private ImageButton getValue, home, about;
	private String [] firstBand = {"Black","Brown","Red","Orange","Yellow","Green","Blue","Violet","Grey","White"};
	private String [] secondBand = {"Black","Brown","Red","Orange","Yellow","Green","Blue","Violet","Grey","White","Gold","Silver"};
	
	@Override
	protected void onCreate(Bundle savedInstanceState){
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_valuecalculator);
		initializeComponents();

		addEffect();
	}

	private void initializeComponents(){
		// user resistor input color
		firstBand = (Spinner) findViewById(R.id.firstBandValue);
		secondBand = (Spinner) findViewById(R.id.secondBandValue);
		multiplier = (Spinner) findViewById(R.id.multiplierBandValue);
		tolerance = (Spinner) findViewById(R.id.toleranceBandValue);

		// user resistor bands input color review
		firstBandColor = (TextView) findViewById(R.id.fistBandColor);
		secondBandColor = (TextView) findViewById(R.id.secondBandColor);
		multiplierColor = (TextView) findViewById(R.id.multiplierColor);
		toleranceColor = (TextView) findViewById(R.id.toleranceBandColor);

		// buttons
		getValue = (ImageButton) findViewById(R.id.getValue);
		home = (ImageButton) findViewById(R.id.home);
		about = (ImageButton) findViewById(R.id.about);

		// resistor value output
		result = (TextView) findViewById(R.id.result);
	}
	
	private void calculateValue(){
		int a = Integer.parseInt(""+firstBand.getSelectedItemPosition() + secondBand.getSelectedItemPosition());
		double b;
		
		if(multiplier.getSelectedItemPosition() == 10){
			b = Math.pow(10, -1);
		}else if(multiplier.getSelectedItemPosition() == 11)
			b = Math.pow(10, -2);
		else
			b = Math.pow(10, multiplier.getSelectedItemPosition());
		
		// result.setText("The resistor value = " + a*b +" Ω ± " + getTolerance(tolerance.getSelectedItemPosition()) + " %");
	}
	private double getTolerance(int a){
		switch(a){
		case 0: return 0;
		case 1 : return 1;
		case 2 : return 2;
		case 3 : return 0;
		case 4 : return 0;
		case 5 : return 0.5;
		case 6 : return 0.25;
		case 7 : return 0.10;
		case 8 : return 0.05;
		case 9 : return 0;
		case 10 : return 5;
		case 11 : return 10;
		default : return 0;
		}
		
	}
	private void setColorBand(TextView view,int index){
		int color;
		switch(index){
		case 0:
		color = Color.BLACK;
		break;
		case 1 :
			color = Color.parseColor("#A52A2A");
			break;
		case 2 :
			color = Color.RED;
			break;
		case 3 :
			color = Color.parseColor("#FFA500");
			break;
		case 4 :
			color = Color.YELLOW;
			break;
		case 5 :
			color = Color.GREEN;
			break;
		case 6 :
			color = Color.BLUE;
			break;
		case 7 :
			color = Color.parseColor("#EE82EE");
			break;
		case 8 :
			color = Color.GRAY;
			break;
		case 9 :
			color = Color.WHITE;
			break;
		case 10 :
			color = Color.parseColor("#FFD700");
			break;
		case 11 :
			color = Color.parseColor("#C0C0C0");
			break;
		default : 
			color = Color.BLACK;
		}
		view.setBackgroundColor(color);
	}
	
	private void addEffect(){
		firstBand.setOnItemSelectedListener(new OnItemSelectedListener(){
			@Override
			public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3){
				setColorBand(firstBandColor, arg2);
			}

			@Override
			public void onNothingSelected(AdapterView<?> arg0){
			}
		});
		secondBand.setOnItemSelectedListener(new OnItemSelectedListener(){

			@Override
			public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3){
				setColorBand(secondBandColor, arg2);
			}

			@Override
			public void onNothingSelected(AdapterView<?> arg0){
			}
		});
		multiplier.setOnItemSelectedListener(new OnItemSelectedListener(){

			@Override
			public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
				setColorBand(multiplierColor, arg2);
			}

			@Override
			public void onNothingSelected(AdapterView<?> arg0){				
			}
		});
		tolerance.setOnItemSelectedListener(new OnItemSelectedListener(){

			@Override
			public void onItemSelected(AdapterView<?> arg0, View arg1, int arg2, long arg3){
				setColorBand(toleranceColor, arg2);
			}

			@Override
			public void onNothingSelected(AdapterView<?> arg0){
			}
		});
		getValue.setOnClickListener(new OnClickListener(){
			
			@Override
			public void onClick(View arg0){
				calculateValue();
				
			}
		});
		home.setOnClickListener(new OnClickListener(){
			
			@Override
			public void onClick(View arg0){
				startActivity(new Intent(ResistorValueCalculator.this, Home.class));
			}
		}); about.setOnClickListener(new OnClickListener(){
			
			@Override
			public void onClick(View arg0){
				startActivity(new Intent(ResistorValueCalculator.this, About.class));
			}
		});
	}

	@Override
	protected void onPause(){
		super.onPause();
		startActivity(new Intent(ResistorValueCalculator.this, Home.class));
		ResistorValueCalculator.this.finish();
	}
	@Override
	public boolean onCreateOptionsMenu(Menu menu){
		MenuInflater inflater = getMenuInflater();
		inflater.inflate(R.menu.menu, menu);
		
		return true;
	}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item){
		if(item.getItemId() == R.id.about){
			startActivity(new Intent(ResistorValueCalculator.this, About.class));
			
		}
		else if(item.getItemId() == R.id.help){
			startActivity(new Intent(ResistorValueCalculator.this, Help.class));
		}
		return true;
	}

	
}
